<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

// Genera automáticamente todas las rutas REST CRUD para produtos
Route::apiResource('products', ProductController::class);
