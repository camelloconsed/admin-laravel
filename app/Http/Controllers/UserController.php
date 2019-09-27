<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $customer = Customer::find($id);                
        $users = Customer::join('users', 'users.customer_id', 'customers.id')->where('users.customer_id', $id)->get();
        
        return view('users.index', compact('users','customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
                
        return view('users.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {

        $idCustomer = $request->customer_id;
        $user = new User();
        //$user->customer_id = User::find($request->customer_id)->id;
        $user->customer_id = $request->customer_id;
        $user->forenames   = $request->forenames;
        $user->surnames    = $request->surnames;
        $user->email       = $request->email;
        $user->password    = bcrypt($request->password);
        $user->save();
            
        
        $users = Customer::join('users', 'users.customer_id', 'customers.id')->where('users.customer_id', $idCustomer)->get();
        $customer = Customer::find($idCustomer); 
        //dd($customer);
        Session::flash('message', 'The User was succefully entered');
        return view('users.index',compact('users','customer'));
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
    public function edit($id, $idCustomer)
    {
        $user = User::find($id);

        return view('users.edit', compact('user','idCustomer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request->all());
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
