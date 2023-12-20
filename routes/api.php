<?php

use App\Http\Controllers\AmigoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/user', function(Request $request){
        return $request->user();
    });
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
    Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('amigos', AmigoController::class);
    Route::apiResource('tareas', TareaController::class);
    Route::get('users/categorias/{id}', [UserController::class, 'getUserCategorias']);
    Route::get('users/amigos/{id}', [UserController::class, 'getUserAmigos']);
    Route::get('users/tareas/{id}', [UserController::class, 'getUserTareas']);
});

// Route::resource('users', UserController::class);

