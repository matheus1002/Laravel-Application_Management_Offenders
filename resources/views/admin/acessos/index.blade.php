@extends('adminlte::page')

@section('title', 'AdminLTE - Log no Sistema')

@section('content_header')
    <h1>Log no Sistema</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                Início
            </a>
        </li>
        <li class="active">
            Acessos
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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-body">
                    <form action="{{ url('admin/acessos/delete') }}" method="post">
                        {{csrf_field()}}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Usuário</th>
                                    <th>Status</th>
                                    <th>Data e Hora</th>
                                    <th>SO</th>
                                    <th>Host</th>
                                    <th>IP</th>
                                    <!--<th>Ação</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($acessos as $acesso)
                                <tr>
                                    
                                    <td>
                                        <input type="checkbox" name="delete[]" value="{{$acesso->id}}">
                                    </td>
                                    <td>{{$acesso->usuario->name}}</td>
                                    <td>
                                        @if($acesso->status == 'Entrada')
                                        <span class="label label-success">
                                            {{$acesso->status}}
                                        </span>
                                        @else
                                        <span class="label label-danger">
                                            {{$acesso->status}}
                                        </span>
                                        @endif
                                    </td>
                                    <td>{{date("d/m/Y H:i:s",strtotime($acesso->created_at))}}</td>
                                    <td>{{$acesso->so}}</td>
                                    <td>{{$acesso->host}}</td>
                                    <td>{{$acesso->ip}}</td>
                                    <!--
                                    <td>
                                    <form action="{{ route('acessos.destroy', $acesso->id) }}" method="post">
                                        @can('log-delete')
                                            {{method_field('DELETE')}}
                                           
                                            <button title="Deletar" class="btn btn-danger">
                                                <span class="fa fa-fw fa-trash"></span>
                                            </button>
                                        @endcan
                                    </form>
                                    </td>
                                    -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div align="center">
                            {!! $acessos !!}
                        </div>                        
                    </div>
                </div>
            </div>
            @can('log-delete')
                <input type="submit" class="btn btn-danger btn-flat" value="Deletar Seleção">   
            @endcan
            </form>
        </div>
   </div>
    
@stop

