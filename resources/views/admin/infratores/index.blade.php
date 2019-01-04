@extends('adminlte::page')

@section('title', 'AdminLTE - Infratores')

@section('content_header')
    <h1>Lista de Infratores</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                Início
            </a>
        </li>
        <li class="active">
            Infratores
        </li>
    </ol>
@stop

@section('content')
    
    @if($message = Session::get('success'))
	<div class="alert alert-success">
		{{$message}}
	</div>
	@endif

   <div class="row">
        <div class="col-md-12"> 
            <div class="box box-warning">
                <div class="box-header with-border">
                    <div class="box-body">
                        <form action="{{url('admin/infratores/search')}}" method="post">
                            {{csrf_field()}}		
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" id="search" name="search" placeholder="Pesquisar por nome ou vulgo do infrator..." value="{{$search}}">
                                <span class="input-group-btn">
                                    <button class="btn btn-success btn-flat">Pesquisar</button>
                                </span>
                            </div>
                        </form>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Vulgo</th>
                                    <th>Situação</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($infratores as $infrator)
                                <tr>
                                    <td>{{$infrator->id}}</td>
                                    <td>{{$infrator->nome}}</td>
                                    <td>{{$infrator->vulgo}}</td>
                                    <td style="font-size: 16px">
                                        @if($infrator->infprocessual->situacao == "Preso")
                                        <span class="label label-success">
                                            {{ $infrator->infprocessual->situacao }}
                                        </span> 
                                        @else
                                        <span class="label label-danger">
                                            {{ $infrator->infprocessual->situacao }}
                                        </span> 
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('infratores.destroy',$infrator->id)}}" method="post"> 
                                            @can('infrator-edit')
                                            <a title="Editar" class="btn btn-warning btn-flat" href="{{ route('infratores.edit',$infrator->id) }}">
                                                    <i class="fa fa-fw fa-pencil"></i>
                                                </a>
                                            <a title="Visualizar" class="btn btn-success btn-flat" href="{{ route('infratores.show',$infrator->id) }}">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            @endcan
                                            @can('infrator-delete')
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button title="Deletar" class="btn btn-danger btn-flat">
                                                <span class="fa fa-fw fa-trash"></span>
                                            </button>
                                        @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div align="center">
                            {!! $infratores !!}
                        </div>                        
                    </div>
                    <div class="row">
                    @can('infrator-create')
                        <div class="col-md-12">
                            <a class="btn btn-primary btn-flat" href="{{ route('infratores.create') }}">Adicionar</a>
                        </div>
                    @endcan
                    </div>
                </div>
            </div>
            
        </div>
   </div>
    
@stop

