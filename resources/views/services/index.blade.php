@extends('blank')

@section('titulo_principal', 'Gerenciar Serviços')

@section('subtitulo', 'Lista de Serviços a serem prestados')

@section('conteudo')
    <a href="{{route('services.create')}}" class="btn btn-success">Novo</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td width="80%">{{$service->nome}}</td>
                    <td width="20%">
                        <a href="{{route('services.edit', $service)}}" class="btn btn-primary"
                           title="Editar" alt="Editar"><small><i class="fa fa-pencil"></i></small></a>

                        <a href="{{route('services.destroy', $service)}}" class="btn btn-danger"
                           title="Excluir" alt="Excluir"
                           onclick="event.preventDefault();
                               if (confirm('Deseja realmente excluir este registro?')){
                               document.getElementById('form-delete{{$service->id}}').submit();
                               }"><small><i class="fa fa-eraser"></i></small></a>

                        <form method="post" action="{{route('services.destroy', $service)}}"
                              style="display: none;" id="form-delete{{$service->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
