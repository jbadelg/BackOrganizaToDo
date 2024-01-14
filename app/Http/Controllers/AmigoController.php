<?php

namespace App\Http\Controllers;

use App\Models\Amigo;
use App\Http\Requests\StoreAmigoRequest;
use App\Http\Requests\UpdateAmigoRequest;
use App\Http\Resources\AmigoResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AmigoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amigos = Amigo::with(['usuario'])->paginate(10);
        $amigos = Amigo::with(['usuario']);
        return AmigoResource::collection($amigos);
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
    public function store(StoreAmigoRequest $request)
    {
        $data = $request->validated();
        $amigo = Amigo::create($data);
        return new AmigoResource($amigo);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $amigo = Amigo::with(['usuario'])->findOrFail($id);
            return new AmigoResource($amigo);
        }catch (ModelNotFoundException $ex){
            return response()->json(['error' => 'Amigo no encontrado'],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Amigo $amigo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAmigoRequest $request, string $id)
    {
        $data = $request->validated();
        Amigo::findOrFail($id)->update($data);
        return response()->json(['message' => 'Amigo Actualizado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Amigo::findOrFail($id)->delete();
        return response()->json(['message' => 'Amigo eliminado correctamente']);
    }
}
