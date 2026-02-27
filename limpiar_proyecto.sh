#!/bin/bash

# Script para limpiar el proyecto para entrevista técnica
# Ejecutar desde: cd api-productos && chmod +x ../limpiar_proyecto.sh && ../limpiar_proyecto.sh

echo "🧹 Limpiando proyecto para entrevista técnica..."
echo ""

# Eliminar carpetas innecesarias
echo "📁 Eliminando carpetas..."
rm -rf tests/
rm -rf resources/views/
rm -rf resources/css/
rm -rf resources/js/
rm -rf database/factories/
rm -rf bootstrap/cache/
mkdir -p bootstrap/cache  # Recrear carpeta vacía

# Eliminar archivos innecesarios
echo "📄 Eliminando archivos..."
rm -f CHANGELOG.md
rm -f package.json
rm -f package-lock.json
rm -f vite.config.js
rm -f phpunit.xml

# Limpiar config innecesaria
echo "⚙️  Limpiando configuración..."
rm -f config/auth.php
rm -f config/broadcasting.php
rm -f config/cache.php
rm -f config/cors.php
rm -f config/filesystem.php
rm -f config/hashing.php
rm -f config/mail.php
rm -f config/queue.php
rm -f config/session.php

# Recrear directorio de storage necesario
echo "💾 Configurando storage..."
mkdir -p storage/app
mkdir -p storage/framework
mkdir -p storage/logs

echo ""
echo "✅ ¡Proyecto limpio!"
echo ""
echo "Estructura final:"
echo ""
tree -L 2 --dirsfirst -a -I 'vendor|node_modules' .
