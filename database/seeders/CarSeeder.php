<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
{
    // --- Vehículos adicionales ---

    Car::create([
        'brand' => 'Volkswagen',
        'model' => 'Golf',
        'price_per_day' => 55,
        'seats' => 5,
        'features' => [
            'bajo consumo',
            'bluetooth',
            'cámara trasera',
            'ideal para ciudad',
        ],
        'image' => 'https://www.topgear.com/sites/default/files/cars-car/image/2024/10/1-Volkswagen-Golf-R-review-2024.jpg?w=1280&h=720'
    ]);

    Car::create([
        'brand' => 'Nissan',
        'model' => 'Kicks',
        'price_per_day' => 60,
        'seats' => 5,
        'features' => [
            'SUV',
            'compacto',
            'aire acondicionado',
            'pantalla táctil',
            'bluetooth',
            'económico',
        ],
        'image' => 'https://www.nissan-cdn.net/content/dam/Nissan/ar/Prensa/Nissan-Kicks-Sense.jpg.ximg.l_full_m.smart.jpg'
    ]);

    Car::create([
        'brand' => 'Hyundai',
        'model' => 'Tucson',
        'price_per_day' => 70,
        'seats' => 5,
        'features' => [
            'SUV',
            'familiar',
            'aire acondicionado',
            'control de crucero',
            'bluetooth',
            'amplio maletero',
        ],
        'image' => 'https://resizer.glanacion.com/resizer/v2/estetica-renovada-para-el-hyundai-ATKVTO5DGFGWZDZXO4SVXRIAZ4.jpg?auth=31180c2fc0e45d136cadc8707f7d3008cf180a2c1a78585bea112db33b77bcb1&width=1280&height=854&quality=70&smart=true'
    ]);

    Car::create([
        'brand' => 'Kia',
        'model' => 'Sportage',
        'price_per_day' => 68,
        'seats' => 5,
        'features' => [
            'SUV',
            'moderno',
            'pantalla táctil',
            'carplay / android auto',
            'aire acondicionado',
            'diseño premium',
        ],
        'image' => 'https://www.topgear.com/sites/default/files/2025/10/Medium-28467-kia-sportage-gt-line-s-dct-fwd-magma-red-1.jpg'
    ]);

    Car::create([
        'brand' => 'Renault',
        'model' => 'Sandero',
        'price_per_day' => 32,
        'seats' => 5,
        'features' => [
            'muy económico',
            'bajo consumo',
            'aire acondicionado',
            'fácil de estacionar',
        ],
        'image' => 'https://cdn.motor1.com/images/mgl/OWp0y/s1/renault-sandero-r-s-2020.webp'
    ]);

    Car::create([
        'brand' => 'Peugeot',
        'model' => '208',
        'price_per_day' => 42,
        'seats' => 5,
        'features' => [
            'compacto',
            'bajo consumo',
            'bluetooth',
            'diseño moderno',
            'ideal para ciudad',
        ],
        'image' => 'https://autotest.com.ar/wp-content/uploads/2020/03/peugeot-208-2019-amarillo-exterior-19_1920x1600c.jpg'
    ]);

    Car::create([
        'brand' => 'Fiat',
        'model' => 'Cronos',
        'price_per_day' => 38,
        'seats' => 5,
        'features' => [
            'sedán',
            'económico',
            'bluetooth',
            'aire acondicionado',
            'bajo consumo',
        ],
        'image' => 'https://autotest.com.ar/wp-content/uploads/2018/04/Fiat-Cronos-Drive-frente.jpg'
    ]);

    Car::create([
        'brand' => 'Chevrolet',
        'model' => 'Tracker',
        'price_per_day' => 65,
        'seats' => 5,
        'features' => [
            'SUV',
            'compacto',
            'turbo',
            'pantalla táctil',
            'bluetooth',
            'aire acondicionado',
        ],
        'image' => 'https://cuyomotor.com.ar/wp-content/uploads/2023/04/Chevrolet-Tracker-RS-2024-004.jpg'
    ]);

    Car::create([
        'brand' => 'Volkswagen',
        'model' => 'T-Roc',
        'price_per_day' => 72,
        'seats' => 5,
        'features' => [
            'SUV',
            'premium',
            'carplay / android auto',
            'control de crucero adaptativo',
            'aire acondicionado',
            'diseño europeo',
        ],
        'image' => 'https://images.coches.com/_vn_/volkswagen/T-Roc/c2063250d9b7be25145910917354f195.jpg?w=1920&ar=4:3'
    ]);

    Car::create([
        'brand' => 'Toyota',
        'model' => 'RAV4',
        'price_per_day' => 90,
        'seats' => 5,
        'features' => [
            'SUV',
            'confiable',
            '4x4',
            'ideal para viajes',
            'aire acondicionado',
            'amplio espacio interior',
        ],
        'image' => 'https://motormagazine.com.ar/wp-content/uploads/2020/06/Toyota-RAV4-2019-1-696x464.jpg'
    ]);

    Car::create([
        'brand' => 'Tesla',
        'model' => 'Model 3',
        'price_per_day' => 110,
        'seats' => 5,
        'features' => [
            'eléctrico',
            'autopilot',
            'pantalla central 15"',
            'cero emisiones',
            'alto rendimiento',
        ],
        'image' => 'https://media.drivingelectric.com/image/private/s--X-WVjvBW--/f_auto,t_content-image-full-desktop@1/v1698686429/drivingelectric/2023-10/Tesla%20Model%203%20facelift%201_awovfc.jpg'
    ]);

    Car::create([
        'brand' => 'Tesla',
        'model' => 'Model Y',
        'price_per_day' => 130,
        'seats' => 5,
        'features' => [
            'eléctrico',
            'SUV',
            'autopilot',
            'gran autonomía',
            'cero emisiones',
        ],
        'image' => 'https://www.topgear.com/sites/default/files/2025/02/1-Tesla-Model-Y-review-2025.jpg'
    ]);

    Car::create([
        'brand' => 'Mercedes-Benz',
        'model' => 'Clase A',
        'price_per_day' => 105,
        'seats' => 5,
        'features' => [
            'lujo compacto',
            'pantalla mbux',
            'bluetooth',
            'asientos de cuero',
            'conducción suave',
        ],
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/f/f6/2018_Mercedes-Benz_A200_AMG_Line_Premium%2B_1.3_Front.jpg'
    ]);

    Car::create([
        'brand' => 'Mercedes-Benz',
        'model' => 'GLE',
        'price_per_day' => 160,
        'seats' => 5,
        'features' => [
            'SUV',
            'de lujo',
            'interior premium',
            'suspensión activa',
            'pantalla táctil dual',
            'tracción 4matic',
        ],
        'image' => 'https://www.cochesyconcesionarios.com/media/cache/1024w/uploads/mercedes/gle/2/od/mercedes-benz-gle-03-459db9c5962bb1d20d728b1e2efe7208ae2e68e0.jpeg'
    ]);

    Car::create([
        'brand' => 'Audi',
        'model' => 'A3',
        'price_per_day' => 100,
        'seats' => 5,
        'features' => [
            'sedán',
            'premium',
            'virtual Cockpit',
            'bluetooth',
            'asientos de cuero',
            'bajo consumo',
        ],
        'image' => 'https://http2.mlstatic.com/D_NQ_829456-MLA82081899301_012025-OO.jpg'
    ]);

    Car::create([
        'brand' => 'Audi',
        'model' => 'Q5',
        'price_per_day' => 145,
        'seats' => 5,
        'features' => [
            'SUV',
            'premium',
            'tracción Quattro',
            'interior de cuero',
            'pantalla mmi',
            'control de crucero adaptativo',
        ],
        'image' => 'https://www.topgear.com/sites/default/files/2025/04/Original-40038-audi-q5deansmith-015.jpg'
    ]);

    Car::create([
        'brand' => 'BMW',
        'model' => 'Serie 3',
        'price_per_day' => 115,
        'seats' => 5,
        'features' => [
            'sedán',
            'deportivo',
            'motor potente',
            'pantalla idrive',
            'asientos de cuero',
            'bluetooth',
        ],
        'image' => 'https://motormagazine.com.ar/wp-content/uploads/2023/08/bmw-serie-3-argentina-2023-1-1-696x372.jpg'
    ]);

    Car::create([
        'brand' => 'Jeep',
        'model' => 'Compass',
        'price_per_day' => 80,
        'seats' => 5,
        'features' => [
            'SUV',
            'aventurero',
            '4x4',
            'aire acondicionado',
            'bluetooth',
            'ideal para terrenos difíciles',
        ],
        'image' => 'https://motormagazine.com.ar/wp-content/uploads/2022/04/nuevo-jeep-compass-trailhawk-argentina-1-1.jpg'
    ]);

    Car::create([
        'brand' => 'Jeep',
        'model' => 'Wrangler',
        'price_per_day' => 95,
        'seats' => 4,
        'features' => [
            'off-road',
            '4x4',
            'techo removible',
            'diseño icónico',
            'todoterreno',
        ],
        'image' => 'https://www.jeep.com/content/dam/fca-brands/na/jeep/en_us/2025/wrangler/gallery/desktop/my25-jeep-wrangler-gallery-01-exterior-desktop.jpg'
    ]);

    Car::create([
        'brand' => 'Ford',
        'model' => 'Mustang',
        'price_per_day' => 125,
        'seats' => 4,
        'features' => [
            'deportivo',
            'motor v8',
            'diseño icónico',
            'alto rendimiento',
            'bluetooth',
        ],
        'image' => 'https://www.topgear.com/sites/default/files/2023/07/24_DarkHourse_BlueEmber_Mediadrive%20NC_04.jpg'
    ]);

    Car::create([
        'brand' => 'Dodge',
        'model' => 'Charger',
        'price_per_day' => 120,
        'seats' => 5,
        'features' => [
            'muscle car',
            'motor potente',
            'ideal para largas distancias',
            'bluetooth',
            'diseño imponente',
        ],
        'image' => 'https://di-uploads-pod12.dealerinspire.com/universitydodgeram/uploads/2018/07/University-Dodge-SRT-Redeye-Charger.jpg'
    ]);

    Car::create([
        'brand' => 'Honda',
        'model' => 'HR-V',
        'price_per_day' => 62,
        'seats' => 5,
        'features' => [
            'SUV',
            'compacto',
            'bajo consumo',
            'amplio interior',
            'bluetooth',
            'ideal para familia',
        ],
        'image' => 'https://motormagazine.com.ar/wp-content/uploads/2016/02/honda-hrv-ex-argentina-1.jpg'
    ]);

    Car::create([
        'brand' => 'Hyundai',
        'model' => 'Ioniq 6',
        'price_per_day' => 115,
        'seats' => 5,
        'features' => [
            'eléctrico',
            'gran autonomía',
            'carga rápida',
            'pantalla táctil',
            'cero emisiones',
        ],
        'image' => 'https://acnews.blob.core.windows.net/imgnews/medium/NAZ_9124e18d26824a429438ff30909669e9.webp'
    ]);

    Car::create([
        'brand' => 'Toyota',
        'model' => 'Hilux',
        'price_per_day' => 88,
        'seats' => 5,
        'features' => [
            'pick-up',
            '4x4',
            'alta durabilidad',
            'ideal para terrenos difíciles',
            'amplia carga',
        ],
        'image' => 'https://cdn.motor1.com/images/mgl/JOx6MQ/s1/2024-toyota-hilux-gr-sport-ii-uk.jpg'
    ]);

    Car::create([
        'brand' => 'Volkswagen',
        'model' => 'Amarok',
        'price_per_day' => 92,
        'seats' => 5,
        'features' => [
            'pick-up',
            'premium',
            'motor tdi',
            '4x4',
            'interior refinado',
            'alta capacidad de carga',
        ],
        'image' => 'https://motormagazine.com.ar/wp-content/uploads/2024/08/nueva-volkswagen-amarok-argentina-1-e1723152483886.jpg.webp'
    ]);
}
}