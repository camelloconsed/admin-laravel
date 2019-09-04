<?php

namespace App\Http\Controllers\V1;

use App\Helpers\DatabaseConnection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ubication;
use Auth;
use DB;

class UbicationController extends Controller
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
        $rows = $connection->table('MAE_UBICACIONES')
            ->select('tipo_ubicacion', 'cod_ubicacion','cod_huerto','cod_sector', 'descripcion');
        if(isset($request->cod_sector)){
            $rows = $rows->where('cod_sector', $request->cod_sector);
        }

        if(isset($request->cod_huerto)){
            $rows = $rows->where('cod_huerto', $request->cod_huerto);
        }

        $rows = $rows->paginate($request->per_page);

        return $this->returnApiSuccess($rows, 'ubications');
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
