<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlatoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'foto' => $this->foto,
            'precio' => $this->precio,
            'categoria' => $this->categoria,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'restaurante_id' => $this->restaurante_id,
        ];
    }
}
