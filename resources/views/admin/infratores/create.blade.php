@extends('adminlte::page')

@section('title', 'AdminLTE - Adicionar Infrator')

@section('content_header')
    <h1>Adicionar Infrator</h1>
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

    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Informações Pessoais</h3>
        </div>
        <form id="form" action="{{route('infratores.store')}}" method="post">
            <div class="box-body">
                {{csrf_field()}}
                <div class="form-group col-md-5">
                    <label>Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control"
                        data-validation="custom" data-validation-regexp="^([A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)$">
		        </div>
                <div class="form-group col-md-4">
                    <label>Vulgo</label>
                    <input type="text" id="vulgo" name="vulgo" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Data de Nascimento</label>
                    <input type="date" id="dataDeNascimento" name="dataDeNascimento" class="form-control"
                        max="{{ date('Y-m-d') }}" data-validation="required">
                </div>
                <div class="form-group col-md-5">
                    <label>Nome da Mãe</label>
                    <input type="text" id="nomeDaMae" name="nomeDaMae" class="form-control" 
                        data-validation="custom" data-validation-regexp="^([A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)$">
		        </div>
                <div class="form-group col-md-4">
                    <label>Nome do Pai</label>
                    <input type="text" id="nomeDoPai" name="nomeDoPai" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Sexo</label>
                    <select id="sexo" name="sexo" class="form-control" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Naturalidade</label>
                    <input type="text" id="naturalidade" name="naturalidade" class="form-control"
                        data-validation="custom" data-validation-regexp="^([A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)$">
                </div>
                <div class="form-group col-md-3">
                    <label>Estado Civil</label>
                    <select id="estadoCivil" name="estadoCivil" class="form-control" required>
                        <option value="Solteiro(a)">Solteiro(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                        <option value="Viúvo(a)">Viúvo(a)</option>
                        <option value="Separado(a)">Separado(a)</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>CPF</label>
                    <input type="text" id="cpf" name="cpf" id="txtCpf" class="form-control" 
                        data-validation="custom" data-validation-regexp="^([0-9 .-]+)$">
		        </div>
                <div class="form-group col-md-2">
                    <label>RG</label>
                    <input type="text" id="rg" name="rg" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                    <label>CNH</label>
                    <input type="text" id="cnh" name="cnh" id="txtCnh" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informações Processuais</h3>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Situação</label>
                    <select id="situacao" name="situacao" class="form-control" >
                        <option value="Preso">Preso</option>
                        <option value="Foragido">Foragido</option>
                    </select>
		        </div>
                <div class="form-group col-md-3">
                    <label>Classe Deliquente</label>
                    <select id="classeDeliquente" name="classeDeliquente" class="form-control" >
                        <option value="Primário">Primário</option>
                        <option value="Reincidente">Reincidente</option>
                    </select>
		        </div>
                <div class="form-group col-md-3">
                    <label>Unidade de Origem</label>
                    <input type="text" id="unidadeDeOrigem" name="unidadeDeOrigem" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>Data de Recolhimento</label>
                    <input type="date" id="dataDeRecolhimento" name="dataDeRecolhimento" class="form-control" 
                        max="{{ date('Y-m-d') }}">
                </div>
                <div class="form-group col-md-12">
                    <label>Observação</label>
                    <textarea id="observacao" name="observacao" class="form-control" style="padding-bottom: 50px;"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Histórico</label>
                    <textarea id="hsitorico" name="historico" class="form-control" style="padding-bottom: 140px;"
                        data-validation="length" data-validation-length="min20"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <div class="box-header with-border">
                        <h3 class="box-title">Endereço</h3>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>CEP</label>
                    <input type="text" id="cep" name="cep" class="form-control"
                        data-validation="custom" data-validation-regexp="^([0-9 -]+)$">
                </div>
                <div class="form-group col-md-7">
                    <label>Rua</label>
                    <input type="text" id="rua" name="rua" class="form-control"
                        data-validation="custom" data-validation-regexp="^([A-Za-z0-9áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)$">
                </div>
                <div class="form-group col-md-2">
                    <label>Número</label>
                    <input type="number" id="numero" name="numero" class="form-control"
                        data-validation="number">
                </div> 
                <div class="form-group col-md-5">
                    <label>Complemento</label>
                    <input type="text" name="complemento" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Bairro</label>
                    <input type="text" id="bairro" name="bairro" class="form-control"
                        data-validation="custom" data-validation-regexp="^([A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)$">
                </div>
                <div class="form-group col-md-3">
                    <label>Cidade</label>
                    <input type="text" id="cidade" name="cidade" class="form-control"
                        data-validation="custom" data-validation-regexp="^([A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)$">
                </div>
                <div class="form-group col-md-1">
                    <label>Estado</label>
                    <input type="text" id="estado" name="estado" class="form-control"
                        data-validation="custom" data-validation-regexp="^([A-Z]+)$">
                </div>
                <div class="form-group col-md-12">
                    <div class="box-header with-border">
                        <h3 class="box-title">Características Físicas</h3>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Étnia</label>
                    <input type="text" id="etnia" name="etnia" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>Olho</label>
                    <input type="text" id="olho" name="olho" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>Barba</label>
                    <input type="text" id="barba" name="barba" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>Dente</label>
                    <input type="text" id="dente" name="dente" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>Orelha</label>
                    <input type="text" id="orelha" name="orelha" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>Boca</label>
                    <input type="text" id="boca" name="boca" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>Nariz</label>
                    <input type="text" id="nariz" name="nariz" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>Sobrancelha</label>
                    <input type="text" id="sobrancelha" name="sobrancelha" class="form-control" >
                </div>
                <div class="form-group col-md-2">
                    <label>Altura</label>
                    <input type="text" id="altura" name="altura" id="txtAltura" class="form-control" 
                        data-validation="custom" data-validation-regexp="^([0-9 ,]+)$">
                </div>
                <div class="form-group col-md-3">
                    <label>Cor do Cabelo</label>
                    <input type="text" id="corDoCabelo" name="corDoCabelo" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>Tipo de Cabelo</label>
                    <input type="text" id="tipoDeCabelo" name="tipoDeCabelo" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                    <label>Cicatriz/Marcas/Tatuagens</label>
                    <input type="text" id="cicMarcTatu" name="cicMarcTatu" class="form-control" >
                </div>
            <div>
            </div>
            <div class="box-footer">
                <button class="btn btn-success btn-flat">Adicionar</button>
            </div>
        <form>
    </div>   
@stop

