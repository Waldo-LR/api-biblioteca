<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibrosResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'isbn' => $this->isbn,
            'anio_publicacion' => $this->anio_publicacion,
            'precio' => (float) $this->precio,
            'autor_id' => $this->autor_id,
            'nombre_autor' => $this->autor ? $this->autor->nombres : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}