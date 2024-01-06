<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TareaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'tarea_id' => $this->id,
            'tarea_nombre' => $this->nombre,
            'tarea_estadoTarea' => $this->estadoTarea,
            'tarea_user_id' => $this->user_id,
            'tarea_categoria_id' => $this->categoria_id,
            'tarea_categoria' => $this->whenLoaded('categoria', function(){
                return new CategoriaResource(($this->categoria));
            }),
            'tarea_tipoTarea' => $this->tipoTarea,
            'tarea_descripcion' => $this->descripcion,
            'tarea_fechaInicio' => $this->fechaInicio,
            'tarea_fechaVencimiento' => $this->fechaVencimiento,
            'tarea_duracion' => $this->duracion,
            'tarea_valor' => $this->valor,
            'tarea_recurrente' => $this->recurrente,
            'tarea_periodicidadRecurrencia' => $this->periodicidadRecurrencia,
            'tarea_subtarea_id' => $this->subtarea_id,
            'tarea_amigo_id' => $this->amigo_id,
            'tarea_created_at' => $this->created_at,
        ];
    }
}
