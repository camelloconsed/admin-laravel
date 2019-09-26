@auth('web')
@extends('layouts.app')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

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
                                <td><a class="btn btn-primary" href="{{ route('users.index', $customer->id) }}"><i class="fas fa-users"></i></a></td>
                                <td><a class="btn btn-success" href="{{ route('customer.edit', $customer->id) }}"><i
                                            class="fas fa-edit"></i></a></td>
                                <td>
                                    <form method="POST" action="{{ route('customer.destroy', $customer->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('you want to delete the company?')"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection
@endauth
