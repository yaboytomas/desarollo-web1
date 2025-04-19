<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UFController;

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

// UF Value API route
Route::get('/uf', [UFController::class, 'getUFValue']);

// Test route to verify API routing
Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'API routes working correctly'
    ]);
}); 