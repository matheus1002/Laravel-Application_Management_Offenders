@extends('adminlte::page')

@section('title', 'AdminLTE - Papéis')

@section('content_header')
    <h1>Lista de Papéis</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                Início
            </a>
        </li>
        <li class="active">
            Papéis
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
            <div class="box box-danger">
                <div class="box-header with-border">
                    <div class="box-body">
                        <form action="{{url('admin/papeis/search')}}" method="post">
                            {{csrf_field()}}		
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" id="search" name="search" placeholder="Pesquisar por nome do papel..." value="{{$search}}">
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
                                    <th>Descrição</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registros as $registro)
                                <tr>
                                    <td>{{$registro->id}}</td>
                                    <td>{{$registro->nome}}</td>
                                    <td>{{$registro->descricao}}</td>
                                    <td>
                                        <form action="{{route('papeis.destroy',$registro->id)}}" method="post">
                                            @can('papel-edit')
                                            <a title="Editar" class="btn btn-warning btn-flat" href="{{route('papeis.edit',$registro->id)}}">
                                                <i class="fa fa-fw fa-pencil"></i>
                                            </a>
                                            <a title="Permissoes" class="btn btn-primary btn-flat" href="{{route('papeis.permissao',$registro->id)}}">
                                                <i class="fa fa-fw fa-lock"></i>
                                            </a>
                                            @endcan
                                            @can('papel-delete')
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
                            {!! $registros !!}
                        </div>                        
                    </div>
                    <div class="row">
                    @can('papel-create')
                        <div class="col-md-12">
                            <a class="btn btn-primary btn-flat" href="{{route('papeis.create')}}">Adicionar</a>
                        </div>
                    @endcan
                    </div>
                </div>
            </div>
            
        </div>
   </div>
    
@stop

