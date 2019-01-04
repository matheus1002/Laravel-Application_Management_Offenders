@extends('adminlte::page')

@section('title', 'AdminLTE - Usuários')

@section('content_header')
    <h1>Lista de Usuários</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                Início
            </a>
        </li>
        <li class="active">
            Usuários
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
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-body">
                        <form action="{{url('admin/usuarios/search')}}" method="post">
                            {{csrf_field()}}		
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" id="search" name="search" placeholder="Pesquisar por nome do usuário..." value="{{$search}}">
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
                                    <th>E-mail</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->id}}</td>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>
                                        <form action="{{route('usuarios.destroy',$usuario->id)}}" method="post"> 
                                            @can('usuario-edit')
                                            <a title="Editar" class="btn btn-warning btn-flat" href="{{route('usuarios.edit',$usuario->id)}}">
                                                    <i class="fa fa-fw fa-pencil"></i>
                                                </a>
                                            <a title="Papel" class="btn btn-primary btn-flat" href="{{route('usuarios.papel',$usuario->id)}}">
                                                <i class="fa fa-fw fa-lock"></i>
                                            </a>
                                            @endcan
                                            @can('usuario-delete')
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
                            {!! $usuarios !!}
                        </div>                        
                    </div>
                    <div class="row">
                    @can('usuario-create')
                        <div class="col-md-12">
                            <a class="btn btn-primary btn-flat" href="{{route('usuarios.create')}}">Adicionar</a>
                        </div>
                    @endcan
                    </div>
                </div>
            </div>
            
        </div>
   </div>
    
@stop

