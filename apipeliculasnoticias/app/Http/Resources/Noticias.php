<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Noticias extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=> $this -> id,
            'Titulo'=> $this -> Titulo,
            'Descripcion'=> $this -> Descripcion,
            'Anio'=> $this -> Anio,
            'Escritor'=> $this -> Escritor

        ];
    }
}
