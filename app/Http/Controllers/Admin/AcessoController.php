<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Acesso;
use App\User;
use Illuminate\Support\Facades\Gate;
use DB;

class AcessoController extends Controller
{
    public function index()
    {
        if (Gate::denies('log-view'))
        {
            abort(403,"Não autorizado!");
        }
        $acessos = Acesso::orderBy('created_at', 'desc')->paginate(10);
        foreach ($acessos as $value) 
        {
            $usuario = User::find($value->user_id);
            $value->usuario = $usuario;
        }
        return view('admin.acessos.index', compact('acessos','usuario'));
    }

    public function destroy($id)
    {
        echo "teste";

        //Acesso::destroy($id); 
        
        //return redirect()->back()->with('success','Acesso Deletado com Sucesso!!!');
    }

    public function delete(Request $request)
    {
        $delets = $request->delete;
        if($delets)
        {
            foreach ($delets as $delet)
            {
                DB::table('acessos')->where('id',$delet)->delete();
            }
            return redirect()->back()->with('success','Acesso(s) Deletado com Sucesso!!!');
            
        } else
            return redirect()->back();
    }
}
