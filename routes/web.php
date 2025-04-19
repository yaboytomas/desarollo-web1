<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UFController;

// Redirect root to projects
Route::get('/', function () {
    return redirect()->route('projects.index');
});

// Project routes
Route::resource('projects', ProjectController::class);

// UF Value API route
Route::get('/api/uf', [UFController::class, 'getUFValue']);
