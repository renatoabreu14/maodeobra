@extends('blank')

@section('titulo_principal', 'Alterar Serviço')

@section('subtitulo', 'Alterar dados do serviço')

@section('conteudo')
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('services.update', $service)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nome do serviço</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome do serviço" value="{{$service->nome}}">
            <button class="btn btn-success" type="submit">Salvar</button>
        </div>
    </form>

@endsection
