@extends('adm.layouts.app')

@section('title', 'login here')


@section('content')


<div class="container">
    <div class="row">
        <main>
            <center>
                <div class="container" >
                    <div  class="z-depth-3 y-depth-3 x-depth-3 grey lighten-4 row" style="background: #FFFFFF !important; display: inline-block; padding: 32px 48px 0px 48px; border: 1px; margin-top: 100px; solid #EEE; width: 470px ; border-radius: 5px;">
                        <div class="section">
                            <img src='{{ asset("images/logos/".$logos->file_image) }}' alt="">
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.auth.loginAdmin') }}">
                                {{ csrf_field() }}

                                <div class="row">

                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <label for="username" class="col m12 control-label">Username</label>

                                        <div class="col m12">
                                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                            @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col m12 control-label">Password</label>

                                        <div class="col m12">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="center">
                                        <div class="col m12">
                                            <button type="submit" class="btn btn-primary" id="btn_login">
                                                INGRESAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </center>
            </main>
        </div>
    </div>
</body>
@endsection