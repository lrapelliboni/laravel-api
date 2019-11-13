<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Http\Resources\VehicleResource;
use Illuminate\Support\Arr;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VehicleResource::collection(Vehicle::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::create([
            'veiculo' => $request->veiculo,
            'marca' => $request->marca,
            'ano' => $request->ano,
            'descricao' => $request->descricao,
            'vendido' => $request->vendido
        ]);

        return new VehicleResource($vehicle);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        if (!$vehicle) {
            return response()->json([
                'message' => 'Veículo não encontrado',
            ], 404);
        }
        return new VehicleResource($vehicle);
    }

    /**
     * Display the specified resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        if ($request->query() !== null
            && Arr::has($request->query(), 'q')) {
            $query = $request->query()['q'];
            $vehicles = Vehicle::where('veiculo', 'like', '%'. $query .'%')->get();
            return VehicleResource::collection($vehicles);
        }
        return $this->index();
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
        $vehicle = Vehicle::find($id);
        if (!$vehicle) {
            return response()->json([
                'message' => 'Veículo não encontrado',
            ], 404);
        }
        $vehicle->update($request->only([
            'veiculo',
            'marca',
            'ano',
            'descricao',
            'vendido'
        ]));
        return new VehicleResource($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        if (!$vehicle) {
            return response()->json([
                'message' => 'Veículo não encontrado',
            ], 404);
        }
        $vehicle->delete();
        return response()->json(null, 204);
    }
}
