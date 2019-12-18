<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientPhoneResource extends JsonResource
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
            'ddd' => $this->ddd,
            'numero' => $this->numero,
            'tipo' => $this->tipo
        ];
        //return parent::toArray($request);
    }
}
