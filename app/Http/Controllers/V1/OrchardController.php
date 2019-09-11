<?php

namespace App\Http\Controllers\V1;

use App\Helpers\DatabaseConnection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orchard;
use Auth;
use DB;

class OrchardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!isset($request->page)){
            $request->page = 1;
        }

        if(!isset($request->per_page)){
            $request->per_page = 10;
        }

        $customer = Auth::user()->customer;
        $connection = DatabaseConnection::setConnection($customer);
        $orchards = $connection->table('MAE_HUERTOS')->select('cod_huerto', 'descripcion')->paginate($request->per_page);

        return $this->returnApiSuccess($orchards, 'orchards');
    }

    public function history(Request $request)
    {
        if(!isset($request->page)){
            $request->page = 1;
        }

        if(!isset($request->per_page)){
            $request->per_page = 10;
        }

        $customer = Auth::user()->customer;
        $connection = DatabaseConnection::setConnection($customer);
        $rows = $connection->table('MAE_PROGRAMAS_RIEGO_HISTORIAL')
            ->select('COD_PROGRAMA','ORDEN_PROGRAMA_HISTORIAL','NOMBRE','FECHA_HORA_INICIO', 'FECHA_HORA_ESTADO', 'TIEMPO_OPERACION', 'TIPO_COD_CAU', 'LITROS_REGADOS', 'COD_HUERTO', 'SECTORES', 'PROM_PRECIPITACION', 'MM_RIEGO', 'M3_PROGRAMADO', 'MM_RIEGO_PROGRAMADO');
        
        if(isset($request->cod_huerto)){
            $rows = $rows->where('cod_huerto', $request->cod_huerto);
        }

        $rows = $rows->orderBy('FECHA_HORA_INICIO', 'DESC')->paginate($request->per_page);

        return $this->returnApiSuccess($rows, 'history');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
