<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient;

class PatientPhone extends Model
{
    protected $fillable = [
        'id',
        'ddd',
        'numero',
        'tipo',
        'patient_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
