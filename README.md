# AI Car Finder - Backend 🚗⚙️

Backend de la aplicación AI Car Finder.  
Se encarga de procesar las búsquedas del usuario, interpretar filtros con IA y devolver los vehículos más relevantes.

---

## 🧠 ¿Cómo funciona?

1. El usuario envía una consulta en lenguaje natural (ej: "auto deportivo barato")
2. La IA interpreta la intención y devuelve filtros estructurados (JSON)
3. El backend aplica filtros dinámicos sobre la base de datos
4. Se seleccionan los mejores resultados
5. Se generan recomendaciones personalizadas con IA

---

## ⚙️ Tecnologías utilizadas

- Laravel
- MySQL
- OpenAI API

---

## 🔍 Funcionalidades principales

- Interpretación de lenguaje natural mediante IA
- Filtros dinámicos (precio, asientos, características)
- Búsqueda eficiente con `whereJsonContains`
- Normalización de datos para evitar inconsistencias
- Generación de recomendaciones personalizadas

---

## 🧠 Ejemplo de flujo

### Input del usuario: 
```json
{
  "query": "Vehículo todoterreno con tracción 4x4"
}
```
### Respuesta de la IA:
```json
{
  "features": ["4x4", "todoterreno"],
  "max_price": 90
}
```
### Resultado:
* Se filtran los vehículos que cumplen con los criterios
* Se ordenan por relevancia
* Se generan recomendaciones con IA

## 🧪 Instalación

* git clone https://github.com/Deiver221/ai-car-finder-backend.git
* cd ai-car-finder-backend
* composer install
* cp .env.example .env
* php artisan key:generate
* php artisan migrate --seed
* php artisan serve

## 🔑Variables de entorno
```
OPENAI_API_KEY=tu_api_key
DB_DATABASE=backend
DB_USERNAME=root
DB_PASSWORD=
```

## 🧠 Desiciones técnicas
- Se normalizaron los features a minúsculas para asegurar coincidencias exactas
- Se utilizó whereJsonContains para filtrar características almacenadas en JSON
- Se limitaron las llamadas a la IA para mejorar el rendimiento
- Se priorizan los mejores resultados para generar recomendaciones

## 📌 Notas
Este proyecto fue desarrollado como parte de un portafolio para demostrar el uso de IA en aplicaciones reales, combinando procesamiento de lenguaje natural con lógica de negocio en backend.
