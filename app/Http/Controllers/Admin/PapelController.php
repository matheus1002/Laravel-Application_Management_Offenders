<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papel;
use App\Permissao;
use Illuminate\Support\Facades\Gate;

class PapelController extends Controller
{
    public function index()
    {
        if (Gate::denies('papel-view'))
        {
            abort(403,"Não autorizado!");
        }
        $registros = Papel::paginate(10);
        return view('admin.papel.index', array('registros'=>$registros,'search'=>null));
    } 

    public function permissao($id)
    {
        if (Gate::denies('papel-edit'))
        {
            abort(403,"Não autorizado!");
        }
        $papel = Papel::find($id);
        $permissao = Permissao::all();
        return view('admin.papel.permissao',compact('papel','permissao'));
    }

    public function permissaoStore(Request $request,$id)
    {
        if (Gate::denies('papel-edit'))
        {
            abort(403,"Não autorizado!");
        }
        $papel = Papel::find($id);
        $dados = $request->all();
        $permissao = Permissao::find($dados['permissao_id']);
        $papel->adicionaPermissao($permissao);
        return redirect()->back();
    }

    public function permissaoDestroy($id,$permissao_id)
    {
        $papel = Papel::find($id);
        $permissao = Permissao::find($permissao_id);
        $papel->removePermissao($permissao);
        return redirect()->back();
    }

    public function create()
    {
        if (Gate::denies('papel-create'))
        {
            abort(403,"Não autorizado!");
        }
        return view('admin.papel.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('papel-create'))
        {
            abort(403,"Não autorizado!");
        }
        $this->validate($request,[
            'nome' => 'required|alpha',
            'descricao' => 'required',
        ]);
        if ($request['nome'] && $request['nome'] != "Admin")
        {
            Papel::create($request->all());
            return redirect()->route('papeis.index')->with('success','Papel Cadastrado com Sucesso!!!'); 
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        if (Gate::denies('papel-edit'))
        {
            abort(403,"Não autorizado!");
        }
        if (Papel::find($id)->nome == "Admin")
        {
            return redirect()->route('papeis.index');
        }
        $registro = Papel::find($id);
        return view('admin.papel.edit',compact('registro'));
    }

    public function update(Request $request,$id)
    {
        if (Gate::denies('papel-edit'))
        {
            abort(403,"Não autorizado!");
        }
        if (Papel::find($id)->nome == "Admin")
        {
            return redirect()->route('papeis.index');
        }
        $this->validate($request,[
            'nome' => 'required|alpha',
            'descricao' => 'required',
        ]);
        if ($request['nome'] && $request['nome'] != "Admin")
        {
            Papel::find($id)->update($request->all());
        }
        return redirect()->route('papeis.index')->with('success','Papel Atualizado com Sucesso!!!');
    }

    public function destroy($id)
    {
        if (Gate::denies('papel-delete'))
        {
            abort(403,"Não autorizado!");
        }
        if (Papel::find($id)->nome == "Admin")
        {
            return redirect()->route('papeis.index');
        }
        Papel::find($id)->delete();
        return redirect()->route('papeis.index')->with('success','Papel Deletado com Sucesso!!!');
    }

    public function search(Request $request)
    {
        $buscaInput = $request->input('search'); 
        if (empty($buscaInput)) {
            return redirect()->route('papeis.index');
        }
        $registros = Papel::where('nome','LIKE','%'.$buscaInput.'%')->paginate(10);
        return view('admin.papel.index',array('registros'=>$registros,'search'=>$buscaInput));
    }
}
