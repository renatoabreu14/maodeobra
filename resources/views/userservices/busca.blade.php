@extends('blank')

@section('titulo_principal', 'Busca por prestador')

@section('subtitulo', 'Busca por prestadores que ofertam um determinado serviço')

@section('conteudo')
    <div class="container-fluid">
    <form action="{{route('mostrarprestador')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <select name="services" id="" class="form-control">
                    @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group col-12">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
    </div>
    @isset($service_busca)

            <div class="container marketing">

                <!-- Three columns of text below the carousel -->
                <div class="row text-center">
                    @foreach($service_busca->users as $user)
                    <div class="col-lg-4">
                        <img src="{{$user->foto}}" class="img-circle" alt="User Image" width="140"  height="140">
                        <h2>{{$user->name}}</h2>
                        <p>{{$user->whatsapp}}</p>
                        {{--<p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>--}}
                    </div><!-- /.col-lg-4 -->
                    @endforeach
                </div><!-- /.row -->



            </div>


    @endisset
    {{--<a href="{{route('services.create')}}" class="btn btn-success">Novo</a>--}}
    {{--<table class="table table-hover">
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
    </table>--}}

@endsection
