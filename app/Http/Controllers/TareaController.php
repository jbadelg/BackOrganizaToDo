<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Http\Requests\StoreTareaRequest;
use App\Http\Requests\UpdateTareaRequest;
use App\Http\Resources\TareaResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::all();
        return response()->json($tareas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTareaRequest $request)
    {
        $data = $request->validated();
        $tarea = Tarea::create($data);
        return $tarea;
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        try{
            $tarea = Tarea::with(['usuario'])->findOrFail($id);
            return new TareaResource($tarea);
        }catch(ModelNotFoundException $ex){
            return response()->json(['error' => 'Tarea no encontrada'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTareaRequest $request, string $id)
    {
        $data = $request->validated();
        Tarea::findOrFail($id)->update($data);
        return response()->json(['message' => 'Tarea actualizada correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tarea::findOrFail($id)->delete();
        return response()->json(['message' => 'Tarea eliminada correctamente']);
    }
}
