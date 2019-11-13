<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'veiculo' => $this->veiculo,
            'marca' => $this->marca,
            'ano' => $this->ano,
            'descricao' => $this->descricao,
            'vendido' => ($this->vendido == 1) ? true : false,
            'created' => (string) $this->created_at,
            'updated' => (string) $this->updated_at
        ];
    }
}
