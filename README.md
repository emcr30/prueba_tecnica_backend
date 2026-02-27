# Prueba Técnica Backend - Gestión de Productos

Bienvenido/a a la prueba técnica backend. Tienes **30 minutos** para completar una **API REST** en Laravel 11.

---

## 📖 Descripción del Problema

Se requiere completar la implementación de una **API REST para gestionar un catálogo de productos** con operaciones CRUD (crear, leer, actualizar, eliminar). El proyecto ya tiene la **estructura base** (modelo Product, tabla de BD, rutas), pero **falta implementar la lógica del controlador** y las **validaciones de datos**. Tu tarea es crear los 5 endpoints funcionales con validación robusta y manejo correcto de errores HTTP.

---

## Preparación del Entorno

### 1. Requisitos
- PHP 8.3+
- Composer 2.0+
- SQLite (incluido)

### 2. Instalación

**Windows:**
```powershell
cd api-productos
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

**macOS/Linux:**
```bash
cd api-productos
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

**API:** `http://127.0.0.1:8000/api`

---

## Objetivo

Desarrollar **5 endpoints CRUD** funcionales:

| Método | Endpoint | Descripción |
|--------|----------|------------|
| GET | `/api/products` | Listar productos |
| POST | `/api/products` | Crear producto |
| GET | `/api/products/{id}` | Obtener producto |
| PUT | `/api/products/{id}` | Actualizar producto |
| DELETE | `/api/products/{id}` | Eliminar producto |

---

## Estructura

```
api-productos/
├── app/Http/Controllers/Api/ProductController.php
├── app/Http/Requests/
│   ├── StoreProductRequest.php
│   └── UpdateProductRequest.php
├── app/Models/Product.php
├── database/migrations/
├── routes/api.php
└── .env
```

---

## Modelo Product

| Campo | Tipo | Validación |
|-------|------|-----------|
| name | String | Requerido, min 3 caracteres |
| description | Text | Opcional |
| price | Decimal | Requerido, > 0 |
| stock | Integer | Requerido, >= 0 |

---

## Ejemplos

**GET /api/products**
```json
[
  {
    "id": 1,
    "name": "Laptop",
    "price": "999.99",
    "stock": 5,
    "created_at": "2026-02-27T10:00:00Z",
    "updated_at": "2026-02-27T10:00:00Z"
  }
]
```

**POST /api/products**
```json
{
  "name": "Monitor",
  "price": 599.99,
  "stock": 10
}
```

Respuesta: **201 Created**

**GET /api/products/1** → **200 OK** o **404 Not Found**

**PUT /api/products/1** → **200 OK** o **404 Not Found**

**DELETE /api/products/1** → **204 No Content** o **404 Not Found**

---

## Validación

**POST:**
```php
'name' => 'required|string|min:3|max:255',
'price' => 'required|numeric|gt:0',
'stock' => 'required|integer|gte:0',
'description' => 'nullable|string'
```

**PUT:** Todos los campos opcionales

---

## Códigos HTTP Esperados

- **200** - GET, PUT exitosos
- **201** - POST exitoso
- **204** - DELETE exitoso
- **404** - Producto no existe
- **422** - Error de validación

---

## Tareas Prioritarias

1. ✅ Validación en StoreProductRequest.php
2. ✅ Validación en UpdateProductRequest.php
3. ✅ Implementar ProductController (index, store, show, update, destroy)
4. ✅ Manejo correcto de errores HTTP
5. ✅ Respuestas JSON correctas

---

## 📂 Archivos a Completar

El postulante debe llenar **3 archivos** con su lógica:

### 1. **app/Http/Requests/StoreProductRequest.php**
- Completa el método `rules()` con las validaciones para crear un producto
- Reglas requeridas: name, price, stock, description

### 2. **app/Http/Requests/UpdateProductRequest.php**
- Completa el método `rules()` con las validaciones para actualizar un producto
- Todos los campos deben ser opcionales (usar `sometimes` en lugar de `required`)

### 3. **app/Http/Controllers/Api/ProductController.php**
- Implementa los 5 métodos CRUD: `index()`, `store()`, `show()`, `update()`, `destroy()`
- Cada método tiene un comentario TODO indicando qué hacer
- Usa el modelo Product para consultas de BD
- Retorna respuestas JSON con códigos HTTP correctos (200, 201, 204, 404, 422)

---

## Pruebas Rápidas

```bash
# Listar
curl http://127.0.0.1:8000/api/products

# Crear
curl -X POST http://127.0.0.1:8000/api/products \
  -H "Content-Type: application/json" \
  -d '{"name":"Producto","price":100,"stock":5}'

# Obtener
curl http://127.0.0.1:8000/api/products/1

# Actualizar
curl -X PUT http://127.0.0.1:8000/api/products/1 \
  -H "Content-Type: application/json" \
  -d '{"price":150}'

# Eliminar
curl -X DELETE http://127.0.0.1:8000/api/products/1
```

---

## Criterios de Evaluación

**Técnico (70%)**
- Funcionalidad correcta
- Validación de datos
- Manejo de errores
- Código limpio

**Git (30%)**
- Commits descriptivos
- Gestión de tiempo
- Resolución de problemas

---

## Consejos

✅ Lee TODO el código antes de empezar  
✅ Commits frecuentes  
✅ Prueba mientras desarrollas  
✅ Funcionalidad primero  
✅ Sin librerías adicionales  

---

## FAQ

**¿Puedo usar otras librerías?**  
No, solo las de composer.json

**¿Qué pasa si no termino?**  
Se evalúa lo completado

**¿Problemas con setup?**  
Avisa inmediatamente

---

**¡Buena suerte! Tienes 30 minutos. ¡Adelante! 🚀**
