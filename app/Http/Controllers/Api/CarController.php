<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarController extends Controller
{
    //OBTENER VEHÍCULOS
    public function index(Request $request)
    {
        $cars = Car::query()
            ->when($request->max_price, fn($q) =>
                $q->where('price_per_day', '<=', $request->max_price)
            )
            ->when($request->seats, fn($q) =>
                $q->where('seats', '>=', $request->seats)
            )
            ->when($request->features, function ($q) use ($request) {
                foreach ($request->features as $feature) {
                    $q->whereJsonContains('features', $feature);
                }
            })
            ->get();

        return response()->json($cars);
    }
    //LA IA CONVIERTE EL INPUT A FILTROS
    private function getFiltersFromAI($input)
    {
        $apiKey = env('GROQ_API_KEY');

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
            'Content-Type'  => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model'    => 'meta-llama/llama-4-scout-17b-16e-instruct',
            'messages' => [
                [
                    'role'    => 'system',
                    'content' => '
                        Eres un asistente que convierte solicitudes de autos en filtros JSON.

                        Reglas:
                        - "barato" significa max_price = 49
                        - "medio" significa min_price = 50 y max_price = 80
                        - "caro" significa min_price = 81
                        - "familiar" implica seats >= 5
                        - "lujo" puede implicar features como "Lujo" o "SUV premium"

                        Devuelve SOLO un JSON con:
                        - min_price (number o null)
                        - max_price (number o null)
                        - seats (number o null)
                        - features (array o null)

                        No agregues texto adicional. Sin markdown, sin bloques de código.
                    '
                ],
                [
                    'role'    => 'user',
                    'content' => $input
                ]
            ],
            'temperature' => 0.1, // bajo para respuestas consistentes
        ]);

        $text = $response->json('choices.0.message.content');
        $text = trim(preg_replace('/```json|```/', '', $text));

        $data = json_decode($text, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return null; // o manejar error
        }

        return [
            'min_price' => $data['min_price'] ?? null,
            'max_price' => $data['max_price'] ?? null,
            'seats'     => $data['seats'] ?? null,
            'features'  => $data['features'] ?? null,
        ];
    }

    private function generateRecommendations($cars, $filters)
    {
        $apiKey = env('GROQ_API_KEY');

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
            'Content-Type'  => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'meta-llama/llama-4-scout-17b-16e-instruct',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => '
                        Eres un asistente que recomienda autos.

                        Recibirás una lista de autos y filtros del usuario.

                        Debes decidir:
                        - cuál es la mejor opción
                        - cuál es una alternativa

                        Devuelve SOLO un JSON con este formato:
                        {
                        "best": { "index": 0, "reason": "explicación..." },
                        "alternative": { "index": 1, "reason": "explicación..." }
                        }

                        Reglas:
                        - Usa tono natural
                        - Máximo 2 líneas por explicación
                        - Usa el nombre del auto (marca + modelo)
                        - No usar markdown
                        - Al recibir del usuario la palabra "Todo Terreno o Todoterreno" no uses unicamente SUV para los filtros, en cambio usa: "4x4, off-road o todoterreno"
                        - Todos los features deben estar en minúsculas.
                    '
                ],
                [
                    'role' => 'user',
                    'content' => json_encode([
                        'cars' => $cars,
                        'filters' => $filters
                    ])
                ]
            ],
            'temperature' => 0.7,
        ]);

        $text = $response->json('choices.0.message.content');

        // limpiar por si mete ```json
        $text = trim(preg_replace('/```json|```/', '', $text));
        
        return json_decode($text, true);
    }

    //BÚSQUEDA DE AUTOS
        public function aiSearch(Request $request)
    {
        $userInput = $request->input('query');

        // 1. IA interpreta
        $filters = $this->getFiltersFromAI($userInput);

        // 2. Query (usas lo que ya hiciste 🔥)
        $cars = Car::query();
            if (!empty($filters['seats'])) {
                $cars->where('seats', '>=', $filters['seats']);
            }
            if (!empty($filters['features'])) {
                foreach ($filters['features'] as $feature) {
                    $feature = strtolower(trim($feature));
                    $cars->whereJsonContains('features', $feature);
                }
            }
            if (!empty($filters['min_price'])) {
                $cars->where('price_per_day', '>=', $filters['min_price']);
            }

            if (!empty($filters['max_price'])) {
                $cars->where('price_per_day', '<=', $filters['max_price']);
            }
            
            $message = "Mostrando autos que coinciden";

            if ($filters['seats']) {
                $message .= " para {$filters['seats']} personas";
            }

            if ($filters['max_price']) {
                $message .= " con precio menor a {$filters['max_price']}$";
            }

            if ($filters['features']) {
                $message .= " que incluyen " . implode(', ', $filters['features']);
            }
            
        $cars = $cars->take(2)->get();

        $recommendations = $this->generateRecommendations($cars, $filters);

        if ($recommendations) {
        // Mejor opción
        if (isset($recommendations['best'])) {
            $bestIndex = $recommendations['best']['index'];

            if (isset($cars[$bestIndex])) {
                $cars[$bestIndex]->recommendation = $recommendations['best']['reason'];
                $cars[$bestIndex]->is_best = true;
            }
        }

        // Alternativa
        if (isset($recommendations['alternative'])) {
            $altIndex = $recommendations['alternative']['index'];

            if (isset($cars[$altIndex])) {
                $cars[$altIndex]->recommendation = $recommendations['alternative']['reason'];
                $cars[$altIndex]->is_alternative = true;
            }
        }

        $cars = $cars->sortByDesc(function ($car) {
            if (!empty($car->is_best)) return 2;
            if (!empty($car->is_alternative)) return 1;
            return 0;
        })->values();
    }

        if (!$recommendations) {
        foreach ($cars as $car) {
            $car->recommendation = "Este vehículo es una buena opción según tu búsqueda.";
            }
        }
        
        return response()->json([
            "filters" => $filters,
            "cars" => $cars,
            "message" => $message,
        ]);
    }
    
}
