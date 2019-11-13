<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'id',
        'veiculo',
        'marca',
        'ano',
        'descricao',
        'vendido'
    ];
}
