@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <form action="{{route('loginsocial')}}" method="post">
                @csrf
                <button type="submit" name="social_type" value="github" class="btn btn-block btn-social btn-github btn-flat"><i class="fa fa-github"></i> Entrar usando o Github</button>
                <button type="submit" name="social_type" value="google" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Entrar usando o Google</button>
            </form>
        </div>
        <!-- /.social-auth-links -->

        <a href="#">Esqueci minha senha</a><br>
        <a href="{{route('users.create')}}" class="text-center">Cadastrar um novo usuário</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
