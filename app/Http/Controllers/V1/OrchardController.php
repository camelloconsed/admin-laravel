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
        $customer = Auth::user()->customer;
        $connection = DatabaseConnection::setConnection($customer->db_host, $customer->db_port, $customer->db_name, $customer->db_user, $customer->db_password);
        //$users = $connection->select(...);
        $model_orchards = new Orchard;
        $model_orchards->setConnection($connection);
        //dd($connection);
        //$orchards = (new Orchard)->setConnection($connection)->select('select cod_huerto, descripcion from MAE_HUERTOS');
       // $orchards = $model_orchards->select('select cod_huerto, descripcion from MAE_HUERTOS');
        //$orchards = $model_orchards->select('cod_huerto', 'descripcion')->get();
        //dd($connection);
        //$orchards = (new Orchard)->setConnection($connection)->paginate(2);
        //$orchards = $connection->select('select cod_huerto, descripcion from MAE_HUERTOS')->paginate(1);
        
        
        $orchards = $connection->table('MAE_HUERTOS')->select('cod_huerto', 'descripcion')->paginate(2);
        //$orchards = $connection->select('select cod_huerto, descripcion from MAE_HUERTOS');



        dd($orchards);
        return $this->returnApiSuccess($orchards, 'orchards');
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
