<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Infrator;
use App\Infprocessual;
use App\Endereco;
use App\Caracfisica;
use DB;
use DateTime;
use File;
use Illuminate\Support\Facades\Gate;

class InfratorController extends Controller
{
    public function index()
    {
        if (Gate::denies('infrator-view'))
        {
            abort(403,"Não autorizado!");
        }
        $infratores = Infrator::paginate(10);
        return view('admin.infratores.index', array('infratores'=>$infratores,'search'=>null));
    }

    public function create()
    {
        if (Gate::denies('infrator-create'))
        {
            abort(403,"Não autorizado!");
        }
        return view('admin.infratores.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('infrator-create'))
        {
            abort(403,"Não autorizado!");
        }

        DB::beginTransaction();

        $infrator = new Infrator();
        $infrator->nome = $request->input('nome');
        $infrator->vulgo = $request->input('vulgo');
        $infrator->dataDeNascimento = $request->input('dataDeNascimento');
        $infrator->nomeDaMae = $request->input('nomeDaMae');
        $infrator->nomeDoPai = $request->input('nomeDoPai');
        $infrator->sexo = $request->input('sexo');
        $infrator->naturalidade = $request->input('naturalidade');
        $infrator->estadoCivil = $request->input('estadoCivil');
        $infrator->cpf = $request->input('cpf');
        $infrator->rg = $request->input('rg');
        $infrator->cnh = $request->input('cnh');
        $infrator->fotoDePerfil = $request->input('fotoDePerfil');
        $infrator->save();

        $infprocessual = New Infprocessual();
        $infprocessual->situacao = $request->input('situacao');
        $infprocessual->classeDeliquente = $request->input('classeDeliquente');
        $infprocessual->unidadeDeOrigem = $request->input('unidadeDeOrigem');
        $infprocessual->dataDeRecolhimento = $request->input('dataDeRecolhimento');
        $infprocessual->observacao = $request->input('observacao');
        $infprocessual->historico = $request->input('historico');
        $infrator->infprocessual()->save($infprocessual);

        $endereco = New Endereco();
        $endereco->cep = $request->input('cep');
        $endereco->rua = $request->input('rua');
        $endereco->numero = $request->input('numero');
        $endereco->complemento = $request->input('complemento');
        $endereco->bairro = $request->input('bairro');
        $endereco->cidade = $request->input('cidade');
        $endereco->estado = $request->input('estado');
        $infrator->endereco()->save($endereco);

        $caracfisica = New Caracfisica();
        $caracfisica->etnia = $request->input('etnia');
        $caracfisica->olho = $request->input('olho');
        $caracfisica->barba = $request->input('barba');
        $caracfisica->dente = $request->input('dente');
        $caracfisica->orelha = $request->input('orelha');
        $caracfisica->boca = $request->input('boca');
        $caracfisica->nariz = $request->input('nariz');
        $caracfisica->sobrancelha = $request->input('sobrancelha');
        $caracfisica->altura = $request->input('altura');
        $caracfisica->corDoCabelo = $request->input('corDoCabelo');
        $caracfisica->tipoDeCabelo = $request->input('tipoDeCabelo');
        $caracfisica->cicMarcTatu = $request->input('cicMarcTatu');
        $caracfisica->fotoFrente = $request->input('fotoFrente');
        $caracfisica->fotoLadoDireito = $request->input('fotoLadoDireito');
        $caracfisica->fotoLadoEsquerdo = $request->input('fotoLadoEsquerdo');
        $infrator->caracfisica()->save($caracfisica);

        DB::commit();
        
        return redirect()->route('infratores.index')->with('success','Infrator Cadastrado com Sucesso!!!');
    }

    public function show($id)
    {
        if (Gate::denies('infrator-view'))
        {
            abort(403,"Não autorizado!");
        }
        $infrator = Infrator::find($id);

        $date = new DateTime($infrator->dataDeNascimento);
        $now = new DateTime();
        $idade = $now->diff($date)->y;

        return view('admin.infratores.show', compact('infrator','idade'));
    }

    public function edit($id)
    {
        if (Gate::denies('infrator-edit'))
        {
            abort(403,"Não autorizado!");
        }
        $infrator = Infrator::find($id);
        return view('admin.infratores.edit', compact('infrator'));
    }

    public function update(Request $request, $id)
    {
        if (Gate::denies('infrator-edit'))
        {
            abort(403,"Não autorizado!");
        }

        DB::beginTransaction();
        
        $infrator = Infrator::find($id);
        $infrator->nome = $request->get('nome');
        $infrator->vulgo = $request->get('vulgo');
        $infrator->dataDeNascimento = $request->get('dataDeNascimento');
        $infrator->nomeDaMae = $request->get('nomeDaMae');
        $infrator->nomeDoPai = $request->get('nomeDoPai');
        $infrator->sexo = $request->get('sexo');
        $infrator->naturalidade = $request->get('naturalidade');
        $infrator->estadoCivil = $request->get('estadoCivil');
        $infrator->cpf = $request->get('cpf');
        $infrator->rg = $request->get('rg');
        $infrator->cnh = $request->get('cnh');
        $infrator->fotoDePerfil = $request->get('fotoDePerfil');
        $infrator->save();

        $infprocessual = Infprocessual::find($id);
        $infprocessual->situacao = $request->get('situacao');
        $infprocessual->classeDeliquente = $request->get('classeDeliquente');
        $infprocessual->unidadeDeOrigem = $request->get('unidadeDeOrigem');
        $infprocessual->dataDeRecolhimento = $request->get('dataDeRecolhimento');
        $infprocessual->observacao = $request->get('observacao');
        $infprocessual->historico = $request->get('historico');
        $infrator->infprocessual()->save($infprocessual);

        $endereco = Endereco::find($id);
        $endereco->cep = $request->get('cep');
        $endereco->rua = $request->get('rua');
        $endereco->numero = $request->get('numero');
        $endereco->complemento = $request->get('complemento');
        $endereco->bairro = $request->get('bairro');
        $endereco->cidade = $request->get('cidade');
        $endereco->estado = $request->get('estado');
        $infrator->endereco()->save($endereco);
        
        $caracfisica = CaracFisica::find($id);
        $caracfisica->etnia = $request->get('etnia');
        $caracfisica->olho = $request->get('olho');
        $caracfisica->barba = $request->get('barba');
        $caracfisica->dente = $request->get('dente');
        $caracfisica->orelha = $request->get('orelha');
        $caracfisica->boca = $request->get('boca');
        $caracfisica->nariz = $request->get('nariz');
        $caracfisica->sobrancelha = $request->get('sobrancelha');
        $caracfisica->altura = $request->get('altura');
        $caracfisica->corDoCabelo = $request->get('corDoCabelo');
        $caracfisica->tipoDeCabelo = $request->get('tipoDeCabelo');
        $caracfisica->cicMarcTatu = $request->get('cicMarcTatu');
        $caracfisica->fotoFrente = $request->get('fotoFrente');
        $caracfisica->fotoLadoDireito = $request->get('fotoLadoDireito');
        $caracfisica->fotoLadoEsquerdo = $request->get('fotoLadoEsquerdo');
        $infrator->caracfisica()->save($caracfisica);

        if($request->hasFile('fotoDePerfil'))
        {
            $imgPerfil = $request->file('fotoDePerfil'); 
            $nomearquivoPerfil = md5($id).".".$imgPerfil->getClientOriginalExtension();
            $request->file('fotoDePerfil')->move(public_path('./img/infratores/'.($id)),
                $nomearquivoPerfil);
        }
  
        if($request->hasFile('fotoFrente'))
        {
            $imgFrente = $request->file('fotoFrente');
            $nomearquivoFrente = md5($id+1).".".$imgFrente->getClientOriginalExtension();
            $request->file('fotoFrente')->move(public_path('./img/infratores/'.($id)),
                $nomearquivoFrente);
        }
  
        if($request->hasFile('fotoLadoDireito'))
        {
            $imgDir = $request->file('fotoLadoDireito');
            $nomearquivoDir = md5($id+2).".".$imgDir->getClientOriginalExtension();
            $request->file('fotoLadoDireito')->move(public_path('./img/infratores/'.($id)),
                $nomearquivoDir);
        }
   
        if($request->hasFile('fotoLadoEsquerdo'))
        {
            $imgEsq = $request->file('fotoLadoEsquerdo');
            $nomearquivoEsq = md5($id+3).".".$imgEsq->getClientOriginalExtension();
            $request->file('fotoLadoEsquerdo')->move(public_path('./img/infratores/'.($id)),
                $nomearquivoEsq);
        }
        
        DB::commit();

        if(($infrator->save()) && ( $infrator->infprocessual()->save($infprocessual)) &&
         ( $infrator->endereco()->save($endereco)) && ($infrator->caracfisica()->save($caracfisica)))
        {
            return redirect()->route('infratores.index')->with('success','Infrator Atualizado com Sucesso!!!');
        }
    }

    public function destroy($id)
    {
        if (Gate::denies('infrator-delete'))
        {
            abort(403,"Não autorizado!");
        }
        Infrator::destroy($id);

        if(file_exists("./img/infratores/".$id))
        {
            File::deleteDirectory("./img/infratores/".$id);
        }
        
        return redirect()->back()->with('success','Infrator Deletado com Sucesso!!!');
    }

    public function search(Request $request)
    {
        $buscaInput = $request->input('search'); 
        if (empty($buscaInput)) {
            return redirect()->route('infratores.index');
        }
        $infratores = Infrator::where('nome','LIKE','%'.$buscaInput.'%')
                    ->orwhere('vulgo','LIKE','%'.$buscaInput.'%')
                    ->paginate(10);

        return view('admin.infratores.index',array('infratores'=>$infratores,'search'=>$buscaInput));
    }

    public function pdf($id)
    {
        echo "Teste";
    }

}
