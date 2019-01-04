@extends('adminlte::page')

@section('title', 'AdminLTE - Visualizar Infrator')

@section('content_header')

    <section class="content-header">
        <h1>Visualizar Infrator</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin">
                    Início
                </a>
            </li>
            <li>
                <a href="/admin/infratores">
                    Infratores
                </a>
            </li>
            <li class="active">
                Visualizar
            </li>
        </ol>
    </section>

   
@stop

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        @if(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id).".jpg"))
                            <img class="profile-user-img img-responsive img-circle" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id).'.jpg')}}">
                        @elseif(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id).".png"))
                            <img class="profile-user-img img-responsive img-circle" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id).'.png')}}">
                        @elseif(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id).".jpeg"))
                            <img class="profile-user-img img-responsive img-circle" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id).'.jpeg')}}">
                        @endif
                        <h3 class="profile-username text-center">
                            {{ $infrator->nome }}
                        </h3>
                        <p class="text-muted text-center">
                            {{ $infrator->vulgo }}
                        </p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Situação</b>
                                <a class="pull-right"  style="font-size: 16px">
                                    @if($infrator->infprocessual->situacao == "Preso")
                                    <span class="label label-success">
                                        {{ $infrator->infprocessual->situacao }}
                                    </span> 
                                    @else
                                    <span class="label label-danger">
                                        {{ $infrator->infprocessual->situacao }}
                                    </span> 
                                    @endif
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Idade</b>
                                <a class="pull-right">
                                    {{ $idade }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Nome da Mãe</b>
                                <a class="pull-right">
                                    {{ $infrator->nomeDaMae }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Nome do Pai</b>
                                <a class="pull-right">
                                {{ $infrator->nomeDoPai }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Sexo</b>
                                <a class="pull-right">
                                    {{ $infrator->sexo }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Naturalidade</b>
                                <a class="pull-right">
                                    {{ $infrator->naturalidade }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Estado Civil</b>
                                <a class="pull-right">
                                    {{ $infrator->estadoCivil }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>CPF</b>
                                <a class="pull-right">
                                    {{ $infrator->cpf }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>RG</b>
                                <a class="pull-right">
                                    {{ $infrator->rg }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>CNH</b>
                                <a class="pull-right">
                                    {{ $infrator->cnh }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Adicionado</b>
                                <a class="pull-right">
                                    {{date("d/m/Y H:i",strtotime($infrator->created_at))}}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Atualizado</b>
                                <a class="pull-right">
                                    {{date("d/m/Y H:i",strtotime($infrator->updated_at))}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#infprocessual" data-toggle="tab">Inf. Processual</a></li>
                        <li><a href="#endereco" data-toggle="tab">Endereço</a></li>
                        <li><a href="#caracfisica" data-toggle="tab">Carac. Física</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="infprocessual">
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-info">
                                    <label>Classe Deliquente</label>
                                    <p>{{$infrator->infprocessual->classeDeliquente}}</p>
                                </div>
                                <div class="col-sm-4 invoice-info">
                                    <label>Unidade de Origem</label>
                                    <p>{{$infrator->infprocessual->unidadeDeOrigem}}</p>
                                </div>
                                <div class="col-sm-4 invoice-info">
                                    <label>Data de Recolhimento</label>
                                    <p>{{date("d/m/Y",strtotime($infrator->infprocessual->dataDeRecolhimento))}}</p>
                                </div>
                                <div class="col-sm-12 invoice-info">
                                    <label>Observação</label>
                                    <p align="justify">{{$infrator->infprocessual->observacao}}</p>
                                </div>
                                <div class="col-sm-12 invoice-info">
                                    <label>Hitórico</label>
                                    <p align="justify">{{$infrator->infprocessual->historico}}</p>
                                </div>                              
                                <div class="col-sm-6">
                                @if(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id+1).".jpg"))
                                    <img class="img-responsive" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id+1).'.jpg')}}">
                                @elseif(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id+1).".png"))
                                    <img class="img-responsive" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id+1).'.png')}}">
                                 @elseif(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id+1).".jpeg"))
                                    <img class="img-responsive" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id+1).'.jpeg')}}">
                                @endif
                                </div>
                                <br/>
                                <div class="col-sm-6">
                                @if(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id+2).".jpg"))
                                    <img class="img-responsive" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id+2).'.jpg')}}">
                                @elseif(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id+2).".png"))
                                    <img class="img-responsive" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id+2).'.png')}}">
                                @elseif(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id+2).".jpeg"))
                                    <img class="img-responsive" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id+2).'.jpeg')}}">
                                @endif
                                </div>
                                <br/>
                                <div class="col-sm-12" style="padding-top: 2%">
                                @if(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id+3).".jpg"))
                                    <img class="img-responsive" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id+3).'.jpg')}}">
                                @elseif(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id+3).".png"))
                                    <img class="img-responsive" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id+3).'.png')}}">
                                @elseif(file_exists("./img/infratores/"."$infrator->id/".md5($infrator->id+3).".jpeg"))
                                    <img class="img-responsive" src="{{url('img/infratores/'."$infrator->id/".md5($infrator->id+3).'.jpeg')}}">
                                @endif
                                </div>  
                            </div>
                        </div>
                        <div class=" tab-pane" id="endereco">
                            <div class="row invoice-info">
                                <div class="col-sm-3 invoice-info">
                                    <label>CEP</label>
                                    <p>{{$infrator->endereco->cep}}</p>
                                </div>
                                <div class="col-sm-7 invoice-info">
                                    <label>Rua</label>
                                    <p>{{$infrator->endereco->rua}}</p>
                                </div>
                                <div class="col-sm-2 invoice-info">
                                    <label>Número</label>
                                    <p>{{$infrator->endereco->numero}}</p>
                                </div>
                                <div class="col-sm-4 invoice-info">
                                    <label>Complemento</label>
                                    <p>{{$infrator->endereco->complemento}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Bairro</label>
                                    <p>{{$infrator->endereco->bairro}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Cidade</label>
                                    <p>{{$infrator->endereco->cidade}}</p>
                                </div>
                                <div class="col-sm-2 invoice-info">
                                    <label>Estado</label>
                                    <p>{{$infrator->endereco->estado}}</p>
                                </div>
                            </div>
                        </div>
                        <div class=" tab-pane" id="caracfisica">
                            <div class="row invoice-info">
                                <div class="col-sm-3 invoice-info">
                                    <label>Étnia</label>
                                    <p>{{$infrator->caracfisica->etnia}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Olho</label>
                                    <p>{{$infrator->caracfisica->olho}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Barba</label>
                                    <p>{{$infrator->caracfisica->barba}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Dente</label>
                                    <p>{{$infrator->caracfisica->dente}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Orelha</label>
                                    <p>{{$infrator->caracfisica->orelha}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Boca</label>
                                    <p>{{$infrator->caracfisica->boca}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Nariz</label>
                                    <p>{{$infrator->caracfisica->nariz}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Sobrancelha</label>
                                    <p>{{$infrator->caracfisica->sobrancelha}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Altura</label>
                                    <p>{{$infrator->caracfisica->altura}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Cor do Cabelo</label>
                                    <p>{{$infrator->caracfisica->corDoCabelo}}</p>
                                </div>
                                <div class="col-sm-3 invoice-info">
                                    <label>Tipo de Cabelo</label>
                                    <p>{{$infrator->caracfisica->tipoDeCabelo}}</p>
                                </div>
                                <div class="col-sm-4 invoice-info">
                                    <label>Cicatriz/Marcas/Tatuagens</label>
                                    <p>{{$infrator->caracfisica->cicMarcTatu}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

