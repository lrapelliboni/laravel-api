<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Http\Resources\PatientResource;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PatientResource::collection(
            Patient::with('phones')->paginate(25)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = Patient::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'sexo' => $request->sexo,
            'rg' => $request->rg,
            'cpf' => $request->cpf
        ]);

        return new PatientResource($patient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json([
                'message' => 'Paciente não encontrado',
            ], 404);
        }
        return new PatientResource($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json([
                'message' => 'Paciente não encontrado',
            ], 404);
        }
        $patient->update($request->only([
            'id',
            'nome',
            'idade',
            'sexo',
            'rg',
            'cpf'
        ]));
        return new PatientResource($patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json([
                'message' => 'Paciente não encontrado',
            ], 404);
        }
        $patient->delete();
        return response()->json(null, 204);
    }
}
