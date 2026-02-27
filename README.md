# API REST - Gestión de Productos

API REST simple en Laravel 11 para gestionar un catálogo de productos.

## 🚀 Inicio Rápido (Opción Fácil)

### En Mac/Linux - Una sola línea:

```bash
./start.sh
```

¡Eso es todo! El servidor se iniciará automáticamente.

---

## 🔧 Instalación Manual (Si lo prefieres)

```bash
# Cambiar al directorio del proyecto
cd api-productos

# Instalar dependencias
composer install

# Configurar variables de entorno
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate

# Ejecutar migraciones
php artisan migrate

# Iniciar servidor
php artisan serve
```

API disponible en: `http://127.0.0.1:8000/api/`

## 📋 Endpoints

| Método | Endpoint | Descripción | Status |
|--------|----------|-------------|--------|
| GET | `/api/products` | Listar todos los productos | 200 |
| POST | `/api/products` | Crear nuevo producto | 201 |
| GET | `/api/products/{id}` | Obtener un producto | 200/404 |
| PUT | `/api/products/{id}` | Actualizar producto | 200/404 |
| DELETE | `/api/products/{id}` | Eliminar producto | 204/404 |

## 📝 Campos del Producto

```json
{
  "id": 1,
  "name": "Laptop",              // string, requerido, mín. 3 caracteres
  "description": "Gaming laptop", // text, opcional
  "price": 999.99,               // decimal, requerido, > 0
  "stock": 5,                    // integer, requerido, >= 0
  "created_at": "2026-02-26T17:19:33.000000Z",
  "updated_at": "2026-02-26T17:19:33.000000Z"
}
```

## 🔧 Ejemplos de Uso

### Crear Producto
```bash
curl -X POST http://127.0.0.1:8000/api/products \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Laptop",
    "description": "Laptop gaming",
    "price": 999.99,
    "stock": 5
  }'
```

### Listar Productos
```bash
curl http://127.0.0.1:8000/api/products
```

### Obtener Producto
```bash
curl http://127.0.0.1:8000/api/products/1
```

### Actualizar Producto
```bash
curl -X PUT http://127.0.0.1:8000/api/products/1 \
  -H "Content-Type: application/json" \
  -d '{"price": 849.99, "stock": 10}'
```

### Eliminar Producto
```bash
curl -X DELETE http://127.0.0.1:8000/api/products/1
```

## ✅ Validación

**Al crear producto:**
- `name`: Requerido, mínimo 3 caracteres
- `price`: Requerido, mayor a 0
- `stock`: Requerido, mínimo 0
- `description`: Opcional

**Al actualizar:**
- Todos los campos son opcionales
- Si se envían, aplican las mismas reglas de validación

## 🛑 Códigos de Error

| Código | Mensaje | Descripción |
|--------|---------|-------------|
| 200 | OK | Solicitud exitosa |
| 201 | Created | Producto creado |
| 204 | No Content | Producto eliminado |
| 404 | Not Found | Producto no existe |
| 422 | Validation Failed | Errores de validación |

## 📦 Estructura del Proyecto

```
app/
├── Models/Product.php
├── Http/
│   ├── Controllers/Api/ProductController.php
│   └── Requests/
│       ├── StoreProductRequest.php
│       └── UpdateProductRequest.php

database/
└── migrations/2026_02_26_171046_create_products_table.php

routes/
└── api.php
```

## 🔐 Características

- ✅ Sin autenticación (API pública)
- ✅ Validación robusta
- ✅ Manejo de errores HTTP estándar
- ✅ Respuestas en JSON
- ✅ Timestamps automáticos
- ✅ Base de datos SQLite (configurable)

## 📄 Documentación Completa

Para más detalles, ver [API_DOCUMENTATION.md](API_DOCUMENTATION.md)
