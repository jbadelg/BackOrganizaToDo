<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Resources\CategoriaResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categorias = Categoria::all();
        // return response()->json($categorias);
        $categorias = Categoria::with(['usuario'])->paginate(10);
        return CategoriaResource::collection($categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        //return Categoria::create($request->all());
        $data = $request->validated();
        $categoria = Categoria::create($data);
        return new CategoriaResource($categoria);
    }

    /**
     * Display the specified resource.
     */
    // public function show(Categoria $categoria)
    // {
    //     // return response()->json($categoria);
    //     $categoria = Categoria::with(['usuario'])->findOrFail($id);
    // }
    public function show(string $id)
    {
        try{
            $categoria = Categoria::with(['usuario'])->findOrFail($id);
            //tambien se puede usar:
            //$categoria = Categoria::with(['usuario'])->where('id', $id)->first();
            return new CategoriaResource($categoria);
        }catch(ModelNotFoundException $e){
            return response()->json(['error' => 'Categoría no encontrada'],404);
        }

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
    // public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    // {
    //     $cat = Categoria::findOrFail($categoria->id);
    //     $cat->user_id = $request->user_id;
    //     $cat->nombre = $request->nombre;
    //     $cat->color = $request->color;
    //     $cat->update();
    //     return $cat;
    // }
    public function update(UpdateCategoriaRequest $request, string $id)
    {
        $data = $request->validated();
        // $cat = Categoria::findOrFail($id);
        // $cat->update($data);
        // lo anterior podría ser una sola línea:
        Categoria::findOrfail($id)->update($data);
        return response()->json(['message' => 'Categoría actualizada correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Categoria $categoria)
    // {
    //     $cat = Categoria::findOrFail($categoria->id);
    //     $cat->delete();
    //     return response()->json(response());
    // }
    public function destroy(string $id)
    {
        Categoria::findOrFail($id)->delete();
        return response()->json(['message' => 'Categoría eliminada correctamente']);
    }
}
