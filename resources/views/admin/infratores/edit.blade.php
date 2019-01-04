@extends('adminlte::page')

@section('title', 'AdminLTE - Editar Infrator')

@section('content_header')
    <h1>Editar Infrator</h1>
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

    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Informações Pessoais</h3>
        </div>
        <form action="{{route('infratores.update',$infrator->id)}}" method="post" enctype="multipart/form-data">
            <div class="box-body">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group col-md-5">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ isset($infrator->nome) ? $infrator->nome : '' }}" readonly="">
		        </div>  
                <div class="form-group col-md-4">
                    <label>Vulgo</label>
                    <input type="text" name="vulgo" class="form-control" value="{{ isset($infrator->vulgo) ? $infrator->vulgo : '' }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Data de Nascimento</label>
                    <input type="date" name="dataDeNascimento" class="form-control" value="{{ isset($infrator->dataDeNascimento) ? $infrator->dataDeNascimento : '' }}" readonly="">
                </div>
                <div class="form-group col-md-5">
                    <label>Nome da Mãe</label>
                    <input type="text" name="nomeDaMae" class="form-control" value="{{ isset($infrator->nomeDaMae) ? $infrator->nomeDaMae : '' }}" readonly="">
                </div>
                <div class="form-group col-md-4">
                    <label>Nome do Pai</label>
                    <input type="text" name="nomeDoPai" class="form-control" value="{{ isset($infrator->nomeDoPai) ? $infrator->nomeDoPai : '' }}" readonly="">
                </div>
                <div class="form-group col-md-3">
                    <label>Sexo</label>
                    <select name="sexo" class="form-control" readonly="">
                        <option value="{{ isset($infrator->sexo) ? $infrator->sexo : '' }}">{{ $infrator->sexo }}</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Naturalidade</label>
                    <input type="text" name="naturalidade" class="form-control" value="{{ isset($infrator->naturalidade) ? $infrator->naturalidade : '' }}" readonly="">
                </div>
                <div class="form-group col-md-3">
                    <label>Estado Civil</label>
                    <select name="estadoCivil" class="form-control" readonly="">
                        <option value="{{ isset($infrator->estadoCivil) ? $infrator->estadoCivil : '' }}">{{ $infrator->estadoCivil }}</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>CPF</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" value="{{ isset($infrator->cpf) ? $infrator->cpf : '' }}" readonly="">
                </div>
                <div class="form-group col-md-2">
                    <label>RG</label>
                    <input type="text" name="rg" class="form-control" value="{{ isset($infrator->rg) ? $infrator->rg : '' }}" readonly="">
                </div>
                <div class="form-group col-md-2">
                    <label>CNH</label>
                    <input type="text" name="cnh" id="cnh" class="form-control" value="{{ isset($infrator->cnh) ? $infrator->cnh : '' }}" readonly="">
                </div>
                <div class="form-group col-md-12">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informações Processuais</h3>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Situação</label>
                    <select name="situacao" class="form-control" >
                        <option value="Preso" {{ ($infrator->infprocessual->situacao == 'Preso') ? 'selected' : '' }}>Preso</option>
                        <option value="Foragido" {{ ($infrator->infprocessual->situacao == 'Foragido') ? 'selected' : '' }}>Foragido</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Classe Deliquente</label>
                    <select name="classeDeliquente" class="form-control" >
                        <option value="Primário" {{ ($infrator->infprocessual->classeDeliquente == 'Primário') ? 'selected' : '' }}>Primário</option>
                        <option value="Reincidente" {{ ($infrator->infprocessual->classeDeliquente == 'Reincidente') ? 'selected' : '' }}>Reincidente</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Unidade de Origem</label>
                    <input type="text" name="unidadeDeOrigem" class="form-control" value="{{ isset($infrator->infprocessual->unidadeDeOrigem) ? $infrator->infprocessual->unidadeDeOrigem : '' }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Data de Recolhimento</label>
                    <input type="date" name="dataDeRecolhimento" class="form-control"
                        max="{{ date('Y-m-d') }}" value="{{ isset($infrator->infprocessual->dataDeRecolhimento) ? $infrator->infprocessual->dataDeRecolhimento : '' }}">
                </div>
                <div class="form-group col-md-12">
                    <label>Observação</label>
                    <textarea name="observacao" class="form-control" rows="6">{{ $infrator->infprocessual->observacao }}</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Histórico</label>
                    <textarea name="historico" class="form-control" rows="6" 
                        data-validation="length" data-validation-length="min20">{{ $infrator->infprocessual->historico }}</textarea>
                </div>
                <div class="form-group col-md-12">
                    <div class="box-header with-border">
                        <h3 class="box-title">Endereço</h3>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>CEP</label>
                    <input type="text" name="cep" id="cep" class="form-control" value="{{ isset($infrator->endereco->cep) ? $infrator->endereco->cep : '' }}"
                        data-validation="custom" data-validation-regexp="^([0-9 -]+)$">
                </div>
                <div class="form-group col-md-7">
                    <label>Rua</label>
                    <input type="text" name="rua" id="rua" class="form-control" value="{{ isset($infrator->endereco->rua) ? $infrator->endereco->rua : '' }}" 
                        data-validation="custom" data-validation-regexp="^([A-Za-z0-9áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)$">
                </div>
                <div class="form-group col-md-2">
                    <label>Número</label>
                    <input type="number" name="numero" class="form-control" value="{{ isset($infrator->endereco->numero) ? $infrator->endereco->numero : '' }}" 
                        data-validation="number">
                </div>
                <div class="form-group col-md-5">
                    <label>Complemento</label>
                    <input type="text" name="complemento" class="form-control" value="{{ isset($infrator->endereco->complemento) ? $infrator->endereco->complemento : '' }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Bairro</label>
                    <input type="text" name="bairro" id="bairro" class="form-control" value="{{ isset($infrator->endereco->bairro) ? $infrator->endereco->bairro : '' }}" 
                        data-validation="custom" data-validation-regexp="^([A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)$">
                </div>
                <div class="form-group col-md-3">
                    <label>Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="form-control" value="{{ isset($infrator->endereco->cidade) ? $infrator->endereco->cidade : '' }}" 
                        data-validation="custom" data-validation-regexp="^([A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)$">
                </div>
                <div class="form-group col-md-1">
                    <label>Estado</label>
                    <input type="text" name="estado" id="estado" class="form-control" value="{{ isset($infrator->endereco->estado) ? $infrator->endereco->estado : '' }}" 
                        data-validation="custom" data-validation-regexp="^([A-Z]+)$">
                </div>
                <div class="form-group col-md-12">
                    <div class="box-header with-border">
                        <h3 class="box-title">Características Físicas</h3>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Étnia</label>
                    <input type="text" name="etnia" class="form-control" value="{{ isset($infrator->caracfisica->etnia) ? $infrator->caracfisica->etnia : '' }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Olho</label>
                    <input type="text" name="olho" class="form-control" value="{{ isset($infrator->caracfisica->olho) ? $infrator->caracfisica->olho : '' }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Barba</label>
                    <input type="text" name="barba" class="form-control" value="{{ isset($infrator->caracfisica->barba) ? $infrator->caracfisica->barba : '' }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Dente</label>
                    <input type="text" name="dente" class="form-control" value="{{ isset($infrator->caracfisica->dente) ? $infrator->caracfisica->dente : '' }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Orelha</label>
                    <input type="text" name="orelha" class="form-control" value="{{ isset($infrator->caracfisica->orelha) ? $infrator->caracfisica->orelha : '' }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Boca</label>
                    <input type="text" name="boca" class="form-control" value="{{ isset($infrator->caracfisica->boca) ? $infrator->caracfisica->boca : '' }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Nariz</label>
                    <input type="text" name="nariz" class="form-control" value="{{ isset($infrator->caracfisica->nariz) ? $infrator->caracfisica->nariz : '' }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Sobrancelha</label>
                    <input type="text" name="sobrancelha" class="form-control" value="{{ isset($infrator->caracfisica->sobrancelha) ? $infrator->caracfisica->sobrancelha : '' }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Altura</label>
                    <input type="text" name="altura" id="txtAltura" class="form-control" value="{{ isset($infrator->caracfisica->altura) ? $infrator->caracfisica->altura : '' }}" readonly="">
                </div>
                <div class="form-group col-md-3">
                    <label>Cor do Cabelo</label>
                    <input type="text" name="corDoCabelo" class="form-control" value="{{ isset($infrator->caracfisica->corDoCabelo) ? $infrator->caracfisica->corDoCabelo : '' }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Tipo de Cabelo</label>
                    <input type="text" name="tipoDeCabelo" class="form-control" value="{{ isset($infrator->caracfisica->tipoDeCabelo) ? $infrator->caracfisica->tipoDeCabelo : '' }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Cicatriz/Marcas/Tatuagens</label>
                    <input type="text" name="cicMarcTatu" class="form-control" value="{{ isset($infrator->caracfisica->cicMarcTatu) ? $infrator->caracfisica->cicMarcTatu : '' }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="fotoDePerfil">Foto de Perfil</label>
                    <input type="file" id="fotoDePerfil" name="fotoDePerfil">
                </div>
                <div class="form-group col-md-6">
                    <label for="fotoFrente">Fotos de Frente</label>
                    <input type="file" id="fotoFrente" name="fotoFrente" >
                </div>
                <div class="form-group col-md-6">
                    <label for="fotoLadoDireito">Fotos de lado direito</label>
                    <input type="file" id="fotoLadoDireito" name="fotoLadoDireito">
                </div>  
                <div class="form-group col-md-6">
                    <label for="fotoLadoEsquerdo">Fotos de lado esquerdo</label>
                    <input type="file" id="fotoLadoEsquerdo" name="fotoLadoEsquerdo">
                </div>
            <div>
            </div>
            <div class="box-footer">
                <button class="btn btn-success btn-flat">Atualizar</button>
            </div>
        <form>
    </div>   
@stop

