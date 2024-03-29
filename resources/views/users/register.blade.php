@extends('layouts.app')

@section('conteudo')
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registre um novo usuário</p>

      @if($errors->any())
          <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
          </ul>
      @endif

    <form action="{{route('users.store')}}" method="post">
        @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nome completo" name="name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Senha" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      {{--<div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Repita a senha">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>--}}
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Whatsapp" name="whatsapp">
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        </div>
      <div class="row">
        <div class="col-xs-8">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registre-se</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    {{--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>--}}

    <a href="login.html" class="text-center">Eu já sou um usuário</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

@endsection
