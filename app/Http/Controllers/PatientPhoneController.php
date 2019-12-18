<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\PatientPhone;
use App\Http\Resources\PatientPhoneResource;

class PatientPhoneController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($patientId)
    {
        $patient = Patient::find($patientId);
        if (!$patient) {
            return response()->json([
                'message' => 'Paciente não encontrado',
            ], 404);
        }
        return PatientPhoneResource::collection(
            PatientPhone::where('patient_id', $patientId)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \App\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Patient $patient)
    {
        $phone = PatientPhone::create(
            [
                'ddd' => $request->ddd,
                'numero' => $request->numero,
                'tipo' => $request->tipo,
                'patient_id' => $patient->id
            ]
        );
        return new PatientPhoneResource($phone);
    }
}
