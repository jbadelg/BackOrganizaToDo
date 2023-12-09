<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'categoria_id' => $this->id,
            'categoria_nombre' => $this->nombre,
            'categoria_color' => $this->color,
            'categoria_created_at' => $this->created_at,
            'usuario' => $this->whenLoaded('usuario', function(){
                return new UserResource(($this->usuario));
            })
        ];
    }
}
