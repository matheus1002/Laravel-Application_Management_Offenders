@extends('adminlte::page')

@section('title', 'AdminLTE - Adicionar Papel')

@section('content_header')
    <h1>Adicionar Papel</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                Início
            </a>
        </li>
        <li>
            <a href="/admin/papeis">
                Papéis
            </a>
        </li>
        <li class="active">
            Adicionar
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

    <div class="box box-danger">
        <div class="box-header with-border"></div>
        <form action="{{route('papeis.store')}}" method="post">
            <div class="box-body">
                {{csrf_field()}}
                <div class="form-group col-md-3">
                    <label for="nome">Nome do Papel</label>
                    <input type="text" name="nome" id="nome" class="form-control" 
                        data-validation="custom" data-validation-regexp="^([A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)$">
                </div>
                <div class="form-group col-md-9">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" class="form-control" 
                        data-validation="length" data-validation-length="max100">
                </div>              
            <div>
            </div>
            <div class="box-footer">
                <button class="btn btn-success btn-flat">Adicionar</button>
            </div>
        <form>
    </div> 
@stop

