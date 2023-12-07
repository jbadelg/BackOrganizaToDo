<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;


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
    Route::get('/user',function(Request $request){
        return $request->user();
    });

    // Route::resource('categorias', CategoriaControlle::class);
});
Route::apiResource('categorias', CategoriaController::class);

// Route::resource('users', UserController::class);
// Route::resource('tareas', TareaController::class);
// Route::resource('categorias', CategoriaController::class);
