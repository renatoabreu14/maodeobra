@extends('blank')

@section('titulo_principal', 'Novo Serviço')

@section('subtitulo', 'Cadastrar um novo serviço')

@section('conteudo')
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('services.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome do serviço</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome do serviço">
            <button class="btn btn-success" type="submit">Salvar</button>
        </div>
    </form>

@endsection
