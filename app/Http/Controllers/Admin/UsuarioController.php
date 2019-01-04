<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Papel;
use Illuminate\Support\Facades\Gate;

class UsuarioController extends Controller
{
    public function index()
    {   
        if (Gate::denies('usuario-view'))
        {
            abort(403,"Não autorizado!");
        }
        $usuarios = User::paginate(10);
        return view('admin.usuarios.index', array('usuarios'=>$usuarios,'search'=>null));
    }

    public function papel($id)
    {
        if (Gate::denies('usuario-edit'))
        {
            abort(403,"Não autorizado!");
        }
        $usuario = User::find($id);
        $papel = Papel::all();
        return view('admin.usuarios.papel',compact('usuario','papel'));
    }

    public function papelStore(Request $request,$id)
    {
        if (Gate::denies('usuario-edit'))
        {
            abort(403,"Não autorizado!");
        }
        $usuario = User::find($id);
        $dados = $request->all();
        $papel = Papel::find($dados['papel_id']);
        $usuario->adicionaPapel($papel);
        return redirect()->back();
    }

    public function papelDestroy($id,$papel_id)
    {
        if (Gate::denies('usuario-edit'))
        {
            abort(403,"Não autorizado!");
        }
        $usuario = User::find($id);
        $papel = Papel::find($papel_id);
        $usuario->removePapel($papel);
        return redirect()->back();
    }

    public function create()
    {
        if (Gate::denies('usuario-create'))
        {
            abort(403,"Não autorizado!");
        }
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('usuario-create')) 
        {
            abort(403,"Não autorizado!");
        }
        $this->validate($request,[
            'name' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required|min:6|max:16',
        ]);
        $usuario = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $usuario->adicionaPapel('Usuario');
        return redirect()->route('usuarios.index',compact('usuario'))->with('success','Usuário Cadastrado com Sucesso!!!'); 
    }

    public function show($id){}

    public function edit($id)
    {
        if (Gate::denies('usuario-edit'))
        {
            abort(403,"Não autorizado!");
        }
        $usuario = User::find($id);
        return view('admin.usuarios.edit',compact('usuario'));
    }

    public function update(Request $request,$id)
    {
        if (Gate::denies('usuario-edit'))
        {
            abort(403,"Não autorizado!");
        }
        $this->validate($request,[
            'password' => 'required|min:6|max:16',
        ]);
        User::find($id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('usuarios.index')->with('success','Usuário Atualizado com Sucesso!!!');
    }

    public function destroy($id)
    {
        if (Gate::denies('usuario-delete'))
        {
            abort(403,"Não autorizado!");
        }
        User::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success','Usuário Deletado com Sucesso!!!');
    }

    public function search(Request $request)
    {
        $buscaInput = $request->input('search'); 
        if (empty($buscaInput)) {
            return redirect()->route('usuarios.index');
        }
        $usuarios = User::where('name','LIKE','%'.$buscaInput.'%')->paginate(10);
        return view('admin.usuarios.index',array('usuarios'=>$usuarios,'search'=>$buscaInput));
    }
}
