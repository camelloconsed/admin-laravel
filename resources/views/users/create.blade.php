@auth('web')
@extends('layouts.app')
@section('content')
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <ul>
        <li>{!! session('success') !!}</li>
    </ul>
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        <li>{!! session('error') !!}</li>
    </ul>
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container">
    <div class="card">
        <div class="card-header">Add a new User</div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <input name="customer_id" type="hidden" value="{{ $id }}">
                <div class="form-group">
                    <label for="formGroupExampleInput">Forenames</label>
                    <input type="text" class="form-control" id="forenames" name="forenames" placeholder="Jean"
                        value="{{ old('forenames') }}">
                    @if ($errors->has('forenames'))
                    <strong class="text-danger">{{ $errors->first('forenames') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Surnames</label>
                    <input type="text" class="form-control" id="surnames" name="surnames" placeholder="Pitt"
                        value="{{ old('surnames') }}">
                    @if ($errors->has('surnames'))
                    <strong class="text-danger">{{ $errors->first('surnames') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        placeholder="example@example.com">
                    @if ($errors->has('email'))
                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                        <label for="formGroupExampleInput2">Password</label>
                        <input type="text" class="form-control" id="password" name="password" 
                            value="{{ old('password') }}">
                        @if ($errors->has('password'))
                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                        @endif
                    </div>
                <div class="row pt-4 pb-4 pr-3 pl-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                </div> 
            </form>
        </div>
    </div>
</div>
@endsection
@endauth
