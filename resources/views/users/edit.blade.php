@auth('web')
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit the user</div>
        <div class="card-body">
            <form  action="{{ route('updateUser')}}" method="post">
                {{-- @method('PATCH') --}}
                @csrf
                <input name="customer_id" type="hidden" value="">
                <div class="form-group">
                    <label for="formGroupExampleInput">Forenames</label>
                    <input type="text" class="form-control" id="forenames" name="forenames" placeholder="Jean">
                    @if ($errors->has('forenames'))
                    <strong class="text-danger">{{ $errors->first('forenames') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Surnames</label>
                    <input type="text" class="form-control" id="surnames" name="surnames" placeholder="Pitt">
                    @if ($errors->has('surnames'))
                    <strong class="text-danger">{{ $errors->first('surnames') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Email</label>
                    <input type="text" class="form-control" id="email" name="email" 
                        placeholder="example@example.com">
                    @if ($errors->has('email'))
                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
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
