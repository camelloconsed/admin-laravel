@auth('web')
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
            <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <span>Users of {{ $customer->name }}</span>
                        </div>
                        <div class="col-md-8">
                            <a class="btn btn-primary float-right" href="{{ route('users.create', $customer->id) }}">Add User <i class="fas fa-user-plus"></i></a>
                        </div>
                    </div>
                </div>
        
        <div class="card-body">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Forenames</th>
                        <th>Surnames</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->forenames }}</td>
                        <td>{{ $user->surnames }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-3">
                                    <a class="btn btn-success" href="{{ route('users.edit', ['id'=>$user->id, 'idCustomer'=>$user->customer_id]) }}"><i class="fas fa-key"></i></a>
                                </div>
                                <div class="col-md-3">
                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('you want to delete the user?')"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@endauth
