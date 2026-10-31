<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoresResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombres' => $this->nombres,
            'nacionalidad' => $this->nacionalidad,
            'email' => $this->email,
            'libros' => LibrosResource::collection($this->whenLoaded('libros')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}