@extends('adminlte::page')

@section('title', 'AdminLTE - Editar Usuário')

@section('content_header')
    <h1>Editar Usuário</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                Início
            </a>
        </li>
        <li>
            <a href="/admin/usuarios">
                Usuários
            </a>
        </li>
        <li class="active">
            Editar
        </li>
    </ol>
@stop

@section('content')

    @if($message = Session::get('success'))
	<div class="alert alert-success">
		{{$message}}
	</div>
	@endif
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box box-success">
        <div class="box-header with-border"></div>
        <form action="{{route('usuarios.update',$usuario->id)}}" method="post">
            <div class="box-body">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group col-md-4">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" readonly="true" value="{{isset($usuario->name) ? $usuario->name : ''}}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" readonly="true" value="{{isset($usuario->email) ? $usuario->email : ''}}" required>
                </div>  
                <div class="form-group col-md-4">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" value="{{isset($usuario->password) ? $usuario->password : ''}}" required>
                </div>            
            <div>
            </div>
            <div class="box-footer">
                <button class="btn btn-success btn-flat">Atualizar</button>
            </div>
        <form>
    </div>
     
@stop

