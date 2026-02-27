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
     */
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    /**
     * Guarda un nuevo producto en la base de datos
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        return response()->json($product, 201);
    }

    /**
     * Obtiene un producto específico por su ID
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        
        return response()->json($product, 200);
    }

    /**
     * Actualiza un producto existente
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        
        $product->update($request->validated());
        return response()->json($product, 200);
    }

    /**
     * Elimina un producto de la base de datos
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        
        $product->delete();
        return response()->json(null, 204);
    }
}
