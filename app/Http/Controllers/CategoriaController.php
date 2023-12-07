<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::all();
        return response()->json($categorias); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        //
        return Categoria::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        $cat = Categoria::find($categoria);
        return response()->json($cat);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $cat = Categoria::findOrFail($categoria->id);
        $cat->user_id = $request->user_id;
        $cat->nombre = $request->nombre;
        $cat->color = $request->color;
        $cat->update();
        return $cat;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $cat = Categoria::findOrFail($categoria->id);
        $cat->delete();
        return response()->json(response());
    }
}
