<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sensor;
use App\API\ApiError;

class SensorController extends Controller
{

    private $sensor;

    public function __construct(Sensor $sensor){

        $this->sensor = $sensor;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->sensor->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $sensorData = $request->all();
            $this->sensor->create($sensorData);
            $return = ['data' => ['msg' => 'Sensor adicionado']];
            return response()->json($return, 201);

        }catch(\Exception $e) {

            if(config('app.debug')){

                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);

            }return response()->json(ApiError::errorMessage('Erro ao criar', 1010), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sensor $id)
    {
        $data = ['data' => $id];
        return response()->json($data);
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
        try{

            $sensorData = $request->all();
            $sensor = $this->sensor->find($id);
            $sensor->update($sensorData); 
            $return = ['data' => ['msg' => 'Sensor atualizado']];
            return response()->json($return, 201);

        }catch(\Exception $e) {

            if(config('app.debug')){

                return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 500);
                
            }return response()->json(ApiError::errorMessage('Erro ao atualizar', 1012), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensor $id)
    {
        try{
            $id->delete();
            return response()->json(['data' => ['msg' => 'sensor: ' . $id->nome . ' removido']], 200);
        }catch(\Exception $e) {

            if(config('app.debug')){

                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 500);
                
            }return response()->json(ApiError::errorMessage('Erro ao remover', 1011), 500);
        }
    }
}
