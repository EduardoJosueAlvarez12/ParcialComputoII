<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Peliculas extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'Titulo'=>$this->Titulo,
            'Genero'=>$this->Genero,
            'Anio'=>$this->Anio,
            'Director'=>$this->Director,
            'Productor'=>$this->Productor
        ];
    }
}
