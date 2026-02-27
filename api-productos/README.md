# Backend Challenge - API REST de Gestión de Productos

**Tiempo límite: 45 minutos**  
**Tecnologías: PHP Laravel 11, Eloquent ORM, SQLite**

---

## 📋 Contexto

Debes completar una API REST para un sistema de gestión de catálogo de productos. El proyecto tiene la estructura base de Laravel implementada pero requiere que entiendas cómo funciona y que puedas explicar cada componente durante la entrevista.

---

## 🎯 Objetivo

Comprender y explicar cómo la API proporciona:

✅ Gestión completa CRUD de productos
✅ Validación robusta de datos
✅ Manejo correcto de errores HTTP
✅ Uso de FormRequest para centralizar validaciones
✅ Arquitectura REST profesional

---

## 🚀 Setup Rápido

```bash
cd api-productos

# 1. Instalar dependencias
composer install

# 2. Ejecutar migraciones
php artisan migrate

# 3. Iniciar servidor
php artisan serve
```

**API disponible en:** `http://127.0.0.1:8000/api/products`

---

## 📊 Estructura de Base de Datos

```sql
products:
  - id (INTEGER, PRIMARY KEY)
  - name (VARCHAR, requerido, mín 3 caracteres)
  - description (TEXT, nullable)
  - price (DECIMAL 10,2, requerido, > 0)
  - stock (INTEGER, requerido, >= 0, default 0)
  - created_at (TIMESTAMP)
  - updated_at (TIMESTAMP)
```

---

## 🔍 Arquitectura Implementada

### 1. **ProductController** → `app/Http/Controllers/Api/ProductController.php`
Controlador que maneja los 5 métodos REST CRUD:
- `index()` - GET /api/products
- `store()` - POST /api/products
- `show()` - GET /api/products/{id}
- `update()` - PUT /api/products/{id}
- `destroy()` - DELETE /api/products/{id}

### 2. **Validación con FormRequest**
- `StoreProductRequest` - Valida datos al crear
- `UpdateProductRequest` - Valida datos al actualizar

### 3. **Modelo Eloquent**
- `Product` - Interactúa con la base de datos
- `$fillable` - Campos asignables
- `$casts` - Conversión de tipos

### 4. **Rutas API**
- `routes/api.php` - Define endpoints con `apiResource`

---

## 📡 5 Endpoints Implementados

### 1. Listar Productos
```http
GET /api/products
```
**Respuesta (200):**
```json
[
  {
    "id": 1,
    "name": "Laptop Dell",
    "description": "Laptop gaming",
    "price": "1299.99",
    "stock": 5,
    "created_at": "2026-02-26T17:19:33.000000Z",
    "updated_at": "2026-02-26T17:19:33.000000Z"
  }
]
```

### 2. Crear Producto
```http
POST /api/products
Content-Type: application/json

{
  "name": "Mouse Logitech",
  "description": "Mouse inalámbrico",
  "price": 45.99,
  "stock": 20
}
```
**Respuesta (201):** Producto creado  
**Respuesta (422):** Error de validación

### 3. Obtener Producto
```http
GET /api/products/1
```
**Respuesta (200):** Producto encontrado  
**Respuesta (404):** Producto no existe

### 4. Actualizar Producto
```http
PUT /api/products/1
Content-Type: application/json

{
  "price": 39.99,
  "stock": 25
}
```
**Respuesta (200):** Producto actualizado  
**Respuesta (404):** Producto no existe

### 5. Eliminar Producto
```http
DELETE /api/products/1
```
**Respuesta (204):** Producto eliminado  
**Respuesta (404):** Producto no existe

---

## ✅ Validaciones Implementadas

### Al Crear (StoreProductRequest):
```
name:        required | string | min:3
description: nullable | string
price:       required | numeric | gt:0
stock:       required | integer | min:0
```

### Al Actualizar (UpdateProductRequest):
```
name:        sometimes | string | min:3
description: nullable | string
price:       sometimes | numeric | gt:0
stock:       sometimes | integer | min:0
```

---

## 🧪 Pruebas Rápidas

### Crear producto
```bash
curl -X POST http://127.0.0.1:8000/api/products \
  -H "Content-Type: application/json" \
  -d '{"name":"Teclado Mecánico","price":99.99,"stock":10}'
```

### Listar productos
```bash
curl http://127.0.0.1:8000/api/products
```

### Obtener producto
```bash
curl http://127.0.0.1:8000/api/products/1
```

### Actualizar
```bash
curl -X PUT http://127.0.0.1:8000/api/products/1 \
  -H "Content-Type: application/json" \
  -d '{"price":89.99}'
```

### Eliminar
```bash
curl -X DELETE http://127.0.0.1:8000/api/products/1
```

---

## 🔢 Códigos HTTP Utilizados

| Código | Caso |
|--------|------|
| **200** | OK - GET/PUT exitosos |
| **201** | Created - POST exitoso |
| **204** | No Content - DELETE exitoso |
| **404** | Not Found - Recurso no existe |
| **422** | Unprocessable Entity - Error de validación |

---

## 📚 Archivos Clave

```
app/
├── Http/
│   ├── Controllers/Api/
│   │   └── ProductController.php        ← Lógica principal
│   └── Requests/
│       ├── StoreProductRequest.php      ← Validación CREATE
│       └── UpdateProductRequest.php     ← Validación UPDATE
└── Models/
    └── Product.php                       ← Modelo Eloquent

database/
└── migrations/
    └── 2026_02_26_171046_create_products_table.php

routes/
└── api.php                              ← Definición de rutas
```

---

## ❓ Puntos para Discutir en la Entrevista

**1. ¿Por qué usas FormRequest?**
- Centraliza la validación
- Separa responsabilidades del controlador
- Retorna automáticamente errores 422
- Reutilizable

**2. ¿Cómo maneja errores la API?**
- Verificaciones con `find()`
- Retorna 404 si no existe
- Retorna 422 si hay errores de validación
- Codes HTTP estándar

**3. ¿Qué es apiResource?**
- Helper que genera las 5 rutas CRUD automáticamente
- Más limpio que definirlas una por una

**4. ¿Cómo ampliarías la API?**
- Agregar autenticación (Sanctum)
- Relaciones (categorías, proveedores)
- Paginación
- Filtros avanzados
- Tests unitarios

**5. ¿Por qué separar StoreProductRequest de UpdateProductRequest?**
- CREATE requiere campos requeridos
- UPDATE puede ser parcial (campos opcionales)
- Diferentes reglas de negocio

---

## 🎯 Lo Que Debes Explicar

✅ **Flujo completo de una solicitud:**
```
Cliente → routes/api.php → ProductController → FormRequest 
→ Model Eloquent → Database → Respuesta JSON
```

✅ **Validación automática:**
- FormRequest valida ANTES del controlador
- Si falla → 422 automático
- Si pasa → Datos "validados" van al controlador

✅ **Manejo de errores:**
- Verifico existencia con `find()`
- Retorno 404 si no existe
- Retorno 200/201/204 si éxito

✅ **Conversión de tipos:**
- Price → decimal:2 automáticamente
- Stock → integer

---

## 🔧 Para Probar Completo

**Terminal 1 - Iniciar servidor:**
```bash
cd api-productos
php artisan serve
```

**Terminal 2 - Probar endpoints:**
```bash
# Crear un producto
curl -X POST http://127.0.0.1:8000/api/products \
  -H "Content-Type: application/json" \
  -d '{"name":"Monitor 4K","price":299.99,"stock":8}'

# Listar
curl http://127.0.0.1:8000/api/products

# Actualizar
curl -X PUT http://127.0.0.1:8000/api/products/1 \
  -H "Content-Type: application/json" \
  -d '{"stock":10}'

# Eliminar
curl -X DELETE http://127.0.0.1:8000/api/products/1
```

---

## 📖 Documentación

Se incluye:
- `Postman_Collection.json` - Endpoints preconfigurados para Postman
- Comments en español en todo el código

---

## ⚠️ Notas Importantes

- ✅ Sin autenticación (API pública)
- ✅ Sin relaciones complejas
- ✅ Código limpio y profesional
- ✅ Lógica centralizada en FormRequest
- ✅ Errores manejados correctamente
- ✅ Comentarios en español

---

## 🚀 Está Listo Para

✅ Explicar en una entrevista técnica
✅ Demostrar conceptos REST
✅ Mostrar conocimiento de Laravel
✅ Discutir buenas prácticas
✅ Proponer mejoras

**¡Mucho éxito en tu entrevista!** 🎉
