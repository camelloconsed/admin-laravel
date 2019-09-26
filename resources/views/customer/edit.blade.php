@auth
@extends('layouts.app')
@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="container">
    <form method="post" action="{{ route('customer.update', $customer->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Company Info</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Huertos Lopez"
                                value="{{ $customer->name }}">
                            @if ($errors->has('name'))
                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="ESP_SOCPFSVA" value="{{ $customer->description }}">
                            @if ($errors->has('description'))
                            <strong class="text-danger">{{ $errors->first('description') }}</strong>
                            @endif
                        </div>
                        <div class="input-group-prepend">
                            <label for="formGroupExampleInput2">Logo</label>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo" id="logo"
                                aria-describedby="inputGroupFileAddon01" value="{{ $customer->logo }}">
                            <label class="custom-file-label" for="logo">Choose file</label>
                            @if ($errors->has('logo'))
                            <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Contact Info</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Contact Name</label>
                            <input type="text" class="form-control" id="contact_name" name="contact_name"
                                placeholder="Eduardo Customer" value="{{ $customer->contact_name }}">
                            @if ($errors->has('contact_name'))
                            <strong class="text-danger">{{ $errors->first('contact_name') }}</strong>
                            @endif
                        </div>
                        <div class="form-group">

                            <label for="formGroupExampleInput">Contact Position</label>
                            <input type="text" class="form-control" id="contact_position" name="contact_position"
                                value="{{ $customer->contact_position }}" placeholder="Gerente">
                            @if ($errors->has('contact_position'))
                            <strong class="text-danger">{{ $errors->first('contact_position') }}</strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Contact Phone</label>
                            <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                                value="{{ $customer->contact_phone }}" placeholder="+569912345678">
                            @if ($errors->has('contact_phone'))
                            <strong class="text-danger">{{ $errors->first('contact_phone') }}</strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Contact Email</label>
                            <input type="text" class="form-control" id="contact_email" name="contact_email"
                                value="{{ $customer->contact_email }}" placeholder="example@example.com">
                            @if ($errors->has('contact_email'))
                            <strong class="text-danger">{{ $errors->first('contact_email') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Database Info</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput2">DB Host</label>
                            <input type="text" class="form-control" id="db_host" name="db_host"
                                value="{{ old('db_host') }}" placeholder="000.000.000.00">
                            @if ($errors->has('db_host'))
                            <strong class="text-danger">{{ $errors->first('db_host') }}</strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">DB Port</label>
                            <input type="text" class="form-control" id="db_port" name="db_port"
                                value="{{ old('db_port') }}" placeholder="1234">
                            @if ($errors->has('db_port'))
                            <strong class="text-danger">{{ $errors->first('db_port') }}</strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">DB Name</label>
                            <input type="text" class="form-control" id="db_name" name="db_name"
                                value="{{ old('db_name') }}" placeholder="ESP_SOCPFSVA">
                            @if ($errors->has('db_name'))
                            <strong class="text-danger">{{ $errors->first('db_name') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Database Info</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput2">DB User</label>
                            <input type="text" class="form-control" id="db_user" name="db_user"
                                value="{{ old('db_user') }}" placeholder="frontend">
                            @if ($errors->has('db_user'))
                            <strong class="text-danger">{{ $errors->first('db_user') }}</strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">DB Password</label>
                            <input type="password" class="form-control" id="db_password" name="db_password"
                                placeholder="Password">
                            @if ($errors->has('db_password'))
                            <strong class="text-danger">{{ $errors->first('db_password') }}</strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                                placeholder="Same Password">
                            @if ($errors->has('password_confirm'))
                            <strong class="text-danger">{{ $errors->first('password_confirm') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-4 pb-4 pr-3 pl-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </div>
    </form>
</div>
</div>


@endsection
@endauth
