#!/bin/bash

# Script para iniciar la API REST de Productos

echo "================================================"
echo "  🚀 API REST de Gestión de Productos"
echo "================================================"
echo ""

# Cambiar al directorio del proyecto
cd "$(dirname "$0")/api-productos"

echo "📁 Directorio: $(pwd)"
echo ""

# Verificar si PHP está instalado
if ! command -v php &> /dev/null; then
    echo "❌ Error: PHP no está instalado"
    exit 1
fi

echo "✅ PHP instalado: $(php --version | head -n 1)"
echo ""

# Verificar si las dependencias están instaladas
if [ ! -d "vendor" ]; then
    echo "📦 Instalando dependencias..."
    composer install
    echo ""
fi

# Ejecutar migraciones si es necesario
if [ ! -f "database/database.sqlite" ]; then
    echo "🗄️ Creando base de datos..."
    php artisan migrate --force
    echo ""
fi

echo "🎯 Iniciando servidor en http://127.0.0.1:8000"
echo ""
echo "📝 Endpoints disponibles:"
echo "   GET    /api/products          - Listar todos"
echo "   POST   /api/products          - Crear"
echo "   GET    /api/products/{id}     - Obtener uno"
echo "   PUT    /api/products/{id}     - Actualizar"
echo "   DELETE /api/products/{id}     - Eliminar"
echo ""
echo "💡 Para salir: Presiona Ctrl+C"
echo "================================================"
echo ""

# Iniciar servidor
php artisan serve
