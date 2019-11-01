@extends('blank')

@section('titulo_principal', 'Gerenciar Usuários')

@section('subtitulo', 'Lista de Usuários')

@section('conteudo')
    <a href="{{route('users.create')}}" class="btn btn-success">Novo</a>
    <table class="table table-hover">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>-</th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('users.destroy', $user)}}" class="btn btn-danger"
                            title="Excluir" alt="Excluir"
                            onclick="event.preventDefault();
                            if (confirm('Deseja realmente excluir este registro?')){
                                document.getElementById('form-delete{{$user->id}}').submit();
                            }">
                            <small><i class="fa fa-eraser"></i></small></a>

                        <form method="post" action="{{route('users.destroy', $user)}}"
                              style="display: none;" id="form-delete{{$user->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
