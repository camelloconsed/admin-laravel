<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use Session;


class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();    
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    {
        //dd($request);
        $customer = new Customer();
        
        $customer->name        = $request->name;
        $customer->description = $request->description;
        $customer->logo = Customer::LOGO_TEMP;
        $customer->contact_name = $request->contact_name;
        $customer->contact_position = $request->contact_position;
        $customer->contact_phone = $request->contact_phone;
        $customer->contact_email = $request->contact_email;
        $customer->db_host = $request->db_host;
        $customer->db_port = $request->db_port;
        $customer->db_user = $request->db_user;
        $customer->db_name = $request->db_name;
        $customer->db_password = $request->db_password;
        $customer->status = Customer::ACTIVE;
      
        $customer->save();
        
       
        Session::flash('message','The Company was successfully entered');
        return redirect()->route('customer.index');
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
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
        $customer = Customer::find($id);
        
        $customer->name = $request->name;
        $customer->description = $request->description;
        $customer->logo = Customer::LOGO_TEMP;
        $customer->contact_name = $request->contact_name;
        $customer->contact_position = $request->contact_position;
        $customer->contact_phone = $request->contact_phone;
        $customer->contact_email = $request->contact_email;
        $customer->db_host = $request->db_host;
        $customer->db_port = $request->db_port;
        $customer->db_user = $request->db_user;
        $customer->db_name = $request->db_name;
        $customer->db_password = $request->db_password;
        $customer->status = Customer::ACTIVE;
        $customer->save();     
       
       Session::flash('message','The Company was successfully updated');
       return redirect()->route('customer.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        Session::flash('message', 'The Company was successfully deleted');

        return redirect()->route('customer.index');
    }
}
