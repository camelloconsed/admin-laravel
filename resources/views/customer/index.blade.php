
@auth('web')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                                <div class=" col-md-4">
                                        <span>Companies</span>                                        
                                </div>
                                <div class="col-md-8">                                        
                                     <a class="btn btn-primary float-right" href="{{ route('customer.create') }}">Add Company</a>
                                </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            
                            <tbody>
                                @foreach ($customers as $customer)  
                                <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td><a type="button" class="btn btn-primary" href="#" ><i class="fas fa-users"></i></a></td>
                                        <td><button type="button" class="btn btn-success" href="#" ><i class="fas fa-edit"></i></button></td>
                                        <td><button type="button" class="btn btn-danger" href="#" ><i class="fas fa-trash-alt"></i></button></td>
                                    </tr> 
                                @endforeach
                               
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            
            </div>








        <!--
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                          You are logged in!
                </div>
            </div>
            
        </div>
        -->
    </div>
</div>
@endsection

@endauth
