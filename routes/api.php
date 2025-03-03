<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/all',[ProductController::class, 'AllProducts']);
// Route::post('/addProduct',[ProductController::class, 'AddProduct']);
// Route::get('/Product/{id}',[ProductController::class, 'Product']);
// Route::put('/updateProduct/{id}',[ProductController::class, 'PutProduct']);
Route::apiResource('product',ProductController::class);
Route::get('/allcategories',[CategoryController::class, 'Allcategories']);
Route::post('/addcategorie', [CategoryController::class, 'Addcategorie']);
Route::get('/categorie',[CategoryController::class, 'categorie']);
Route::put('/updatecategorie',[CategoryController::class, 'Putcategorie']);

