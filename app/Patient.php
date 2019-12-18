<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PatientPhone;

class Patient extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'idade',
        'sexo',
        'rg',
        'cpf'
    ];

    public function phones()
    {
        return $this->hasMany(PatientPhone::class);
    }
}
