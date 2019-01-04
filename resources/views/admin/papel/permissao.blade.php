@extends('adminlte::page')

@section('title', 'AdminLTE - Permissões')

@section('content_header')
    <h1>Lista de Permissões para {{$papel->nome}}</h1>

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
            Permissões
        </li>
    </ol>
@stop

@section('content')
    
    <div class="row">
        <div class="col-md-12"> 
            <form action="{{route('papeis.permissao.store',$papel->id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <select name="permissao_id" class="form-control">
                @foreach($permissao as $valor)
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
            <div class="box box-danger">
                <div class="box-header with-border">
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Permissão</th>
                                    <th>Descrição</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($papel->permissoes as $permissao)
                            <tr>
                                <td>{{$permissao->nome}}</td>
                                <td>{{$permissao->descricao}}</td>
                                <td>
                                    <form action="{{route('papeis.permissao.destroy',[$papel->id,$permissao->id])}}" method="post">
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

