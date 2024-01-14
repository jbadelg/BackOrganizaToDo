<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserCategorias($id){
        // $data = User::with('categorias')->findOrFail($id)->categorias;
        // return response()->json($data);
        $user = User::with('categorias')->find($id);
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        $categorias = $user->categorias;
        if ($categorias->isEmpty()) {
            return response()->json(['message' => 'El usuario no tiene categorías'], 200);
        }
        // return response()->json($categorias);
        return CategoriaResource::collection($categorias);
    }

    public function getUserAmigos($id){
        // $data = User::with('amigos')->find($id)->amigos;
        // return response()->json($data);
        $user = User::with('amigos')->find($id);
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        $amigos = $user->amigos;
        if ($amigos->isEmpty()) {
            return response()->json(['message' => 'El usuario no tiene amigos registrados'], 200);
        }
        return response()->json($amigos);
    }

    public function getUserTareas($id){
        // $data = User::with('amigos')->find($id)->amigos;
        // return response()->json($data);
        $user = User::with('tareas')->find($id);
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        $tareas = $user->tareas;
        if ($tareas->isEmpty()) {
            return response()->json(['message' => 'El usuario no tiene tareas pendientes'], 200);
        }
        return response()->json($tareas);
    }
}
