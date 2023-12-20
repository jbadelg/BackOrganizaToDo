<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AmigoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'amigo_id' => $this->id,
            'amigo_nombre' => $this->nombre,
            'amigo_email' => $this->email,
            'amigo_created_at' => $this->created_at,
            'amigo_user_id' => $this->user_id,
            'usuario' => $this->whenLoaded('usuario', function(){
                return new UserResource(($this->usuario));
            })
        ];
    }
}
