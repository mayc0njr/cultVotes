@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-md-center py-5">
        <div class="col-md-6">


            <div class="card border-dark">
                <div class="card-header bg-transparent border-dark">
                    <span class="float-left">Admin Login</span>
                </div>
                <div class="card-body text-dark">
                    

                    <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} ">
                            <div class="row justify-content-center">
                                <label for="email" class="col-md-8 control-label">Email</label>

                                <div class="col-md-8 mx-auto">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="row justify-content-center">
                                <label for="password" class="col-md-8 control-label">Senha</label>

                                <div class="col-md-8 mx-auto">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-8 mx-auto">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Login
                            </button>
                        </div>
                        
                    </form>

                    
                </div>
            </div>
        
        </div>
    </div>
</div>
@endsection
