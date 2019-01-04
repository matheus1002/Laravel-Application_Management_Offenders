@extends('adminlte::page')

@section('title', 'AdminLTE - Papéis')

@section('content_header')
    <h1>Lista de Papéis para {{$usuario->name}}</h1>

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
            Papéis
        </li>
    </ol>
@stop

@section('content')
    
    <div class="row">
        <div class="col-md-12"> 
            <form action="{{route('usuarios.papel.store',$usuario->id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <select name="papel_id" class="form-control">
                @foreach($papel as $valor)
                    <option value="{{$valor->id}}">{{$valor->nome}} </option>
                @endforeach
                </select>
            </div>
                <button class="btn btn-primary btn-flat" style="margin-bottom:15px;">Adicionar</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12"> 
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Papel</th>
                                    <th>Descrição</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($usuario->papeis as $papel)
                            <tr>
                                <td>{{$papel->nome}}</td>
                                <td>{{$papel->descricao}}</td>
                                <td>
                                    <form action="{{route('usuarios.papel.destroy',[$usuario->id,$papel->id])}}" method="post">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button title="Deletar" class="btn btn-danger btn-flat"><i class="fa fa-fw fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   </div>

@stop

