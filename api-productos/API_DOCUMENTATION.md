# API REST de Gestión de Productos - Laravel 11

API REST simple para gestionar productos con validación robusta y manejo de errores.

## Requisitos Cumplidos

✓ Migración y modelo Product con campos: name, description, price, stock, timestamps
✓ Controlador API con respuestas en JSON y códigos HTTP correctos
✓ 5 Endpoints REST funcionales
✓ Validación con FormRequest
✓ Manejo de errores (404, 422, 201, 204)
✓ Sin autenticación ni relaciones
✓ Código simple y claro

## Instalación y Configuración

### Requisitos
- PHP 8.3+
- Composer
- SQLite (por defecto)

### Pasos

```bash
# Instalar dependencias
composer install

# Configurar archivo .env
cp .env.example .env

# Generar key
php artisan key:generate

# Ejecutar migraciones
php artisan migrate

# Iniciar servidor
php artisan serve
```

El servidor estará disponible en `http://127.0.0.1:8000`

## Estructura del Proyecto

```
app/
├── Models/
│   └── Product.php                 # Modelo con fillable y casts
├── Http/
│   ├── Controllers/
│   │   └── Api/
│   │       └── ProductController.php   # Controlador API
│   └── Requests/
│       ├── StoreProductRequest.php     # Validación para crear
│       └── UpdateProductRequest.php    # Validación para actualizar

database/
└── migrations/
    └── 2026_02_26_171046_create_products_table.php

routes/
└── api.php                         # Rutas API
```

## Endpoints

### 1. Listar Productos
```bash
GET /api/products
Accept: application/json

Respuesta (200):
[
  {
    "id": 1,
    "name": "Laptop",
    "description": "Laptop gaming",
    "price": "999.99",
    "stock": 5,
    "created_at": "2026-02-26T17:19:33.000000Z",
    "updated_at": "2026-02-26T17:19:33.000000Z"
  }
]
```

### 2. Crear Producto
```bash
POST /api/products
Content-Type: application/json
Accept: application/json

{
  "name": "Laptop",
  "description": "Laptop gaming",
  "price": 999.99,
  "stock": 5
}

Respuesta (201):
{
  "name": "Laptop",
  "description": "Laptop gaming",
  "price": "999.99",
  "stock": 5,
  "updated_at": "2026-02-26T17:19:33.000000Z",
  "created_at": "2026-02-26T17:19:33.000000Z",
  "id": 1
}
```

### 3. Obtener Producto por ID
```bash
GET /api/products/1
Accept: application/json

Respuesta (200):
{
  "id": 1,
  "name": "Laptop",
  "description": "Laptop gaming",
  "price": "999.99",
  "stock": 5,
  "created_at": "2026-02-26T17:19:33.000000Z",
  "updated_at": "2026-02-26T17:19:33.000000Z"
}

Respuesta Producto No Encontrado (404):
{
  "message": "Product not found"
}
```

### 4. Actualizar Producto
```bash
PUT /api/products/1
Content-Type: application/json
Accept: application/json

{
  "price": 849.99,
  "stock": 10
}

Respuesta (200):
{
  "id": 1,
  "name": "Laptop",
  "description": "Laptop gaming",
  "price": "849.99",
  "stock": 10,
  "created_at": "2026-02-26T17:19:33.000000Z",
  "updated_at": "2026-02-26T17:20:08.000000Z"
}
```

### 5. Eliminar Producto
```bash
DELETE /api/products/1
Accept: application/json

Respuesta (204 No Content):
```

## Validación

### Crear Producto (POST)
- `name`: Requerido, string, mínimo 3 caracteres
- `description`: Opcional, string
- `price`: Requerido, decimal, mayor a 0
- `stock`: Requerido, integer, mínimo 0

### Actualizar Producto (PUT)
- `name`: Opcional, string, mínimo 3 caracteres
- `description`: Opcional, string
- `price`: Opcional, decimal, mayor a 0
- `stock`: Opcional, integer, mínimo 0

### Respuesta de Error de Validación (422):
```json
{
  "message": "The name field must be at least 3 characters. (and 2 more errors)",
  "errors": {
    "name": ["The name field must be at least 3 characters."],
    "price": ["The price field must be greater than 0."],
    "stock": ["The stock field is required."]
  }
}
```

## Códigos HTTP

| Código | Descripción |
|--------|-------------|
| 200    | OK - Operación exitosa |
| 201    | Created - Recurso creado |
| 204    | No Content - Recurso eliminado |
| 404    | Not Found - Recurso no existe |
| 422    | Unprocessable Entity - Error de validación |

## Pruebas con cURL

```bash
# Listar productos
curl http://127.0.0.1:8000/api/products -H "Accept: application/json"

# Crear producto
curl -X POST http://127.0.0.1:8000/api/products \
  -H "Content-Type: application/json" \
  -d '{"name":"Mouse","price":25.99,"stock":100}'

# Obtener producto
curl http://127.0.0.1:8000/api/products/1 -H "Accept: application/json"

# Actualizar producto
curl -X PUT http://127.0.0.1:8000/api/products/1 \
  -H "Content-Type: application/json" \
  -d '{"price":29.99}'

# Eliminar producto
curl -X DELETE http://127.0.0.1:8000/api/products/1 -H "Accept: application/json"
```

## Campos del Modelo Product

| Campo | Tipo | Requerido | Notas |
|-------|------|-----------|-------|
| id | Integer | ✓ | Auto-incremento |
| name | String | ✓ | Mínimo 3 caracteres |
| description | Text | | Nullable |
| price | Decimal(10,2) | ✓ | Mayor a 0 |
| stock | Integer | ✓ | Mínimo 0, default 0 |
| created_at | Timestamp | ✓ | Auto |
| updated_at | Timestamp | ✓ | Auto |

## Características

- ✅ Sin autenticación (API pública)
- ✅ Sin relaciones entre modelos
- ✅ Validación robusta de datos
- ✅ Manejo correcto de errores HTTP
- ✅ Respuestas en JSON
- ✅ Código limpio y fácil de mantener

## Notas

- El precio se almacena como decimal con 2 decimales
- El stock tiene un valor por defecto de 0
- La descripción es opcional
- Todos los timestamps se registran automáticamente
