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
                                        <button type="button" class="btn btn-primary float-right"><i class="far fa-plus-square"> New Company</i></button>
            
                                    </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            
                            <tbody>
                                <tr>
                                    <td>Wallmart S.A</td>
                                    <td><button type="button" class="btn btn-primary" href="#" ><i class="fas fa-users"></i></button></td>
                                    <td><button type="button" class="btn btn-success" href="#" ><i class="fas fa-edit"></i></button></td>
                                    <td><button type="button" class="btn btn-danger" href="#" ><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
                                <tr>
                                        <td>Entel S.A</td>
                                        <td><button type="button" class="btn btn-primary" href="#" ><i class="fas fa-users"></i></button></td>
                                        <td><button type="button" class="btn btn-success" href="#" ><i class="fas fa-edit"></i></button></td>
                                        <td><button type="button" class="btn btn-danger" href="#" ><i class="fas fa-trash-alt"></i></button></td>
                                 </tr>
                                <tr>
                                    <td>Movistar LTDA</td>
                                    <td><button type="button" class="btn btn-primary" href="#" ><i class="fas fa-users"></i></button></td>
                                    <td><button type="button" class="btn btn-success" href="#" ><i class="fas fa-edit"></i></button></td>
                                    <td><button type="button" class="btn btn-danger" href="#" ><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
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
