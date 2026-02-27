<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Obtiene la lista de todos los productos
     * TODO: Completa esta función
     */
    public function index()
    {
        // Tu código aquí
    }

    /**
     * Guarda un nuevo producto en la base de datos
     * TODO: Completa esta función
     */
    public function store(StoreProductRequest $request)
    {
        // Tu código aquí
    }

    /**
     * Obtiene un producto específico por su ID
     * TODO: Completa esta función
     */
    public function show(string $id)
    {
        // Tu código aquí
    }

    /**
     * Actualiza un producto existente
     * TODO: Completa esta función
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        // Tu código aquí
    }

    /**
     * Elimina un producto de la base de datos
     * TODO: Completa esta función
     */
    public function destroy(string $id)
    {
        // Tu código aquí
    }
}
