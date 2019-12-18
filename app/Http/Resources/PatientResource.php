<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'nome' => $this->nome,
            'sexo' => $this->sexo,
            'idade' => $this->idade,
            'rg' => $this->rg,
            'cpf' => $this->cpf,
            'phones' => $this->phones,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
        //return parent::toArray($request);
    }
}
