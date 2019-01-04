<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Papel;
use App\Infrator;
use App\Acesso;

class AdminController extends Controller
{
    public function index()
    {   
        $usuarios = User::all()->count();
        $papeis = Papel::all()->count();
        $infratores = Infrator::all()->count();
        $acessos = Acesso::all()->count();
        return view('admin.index',compact('usuarios','papeis','infratores','acessos'));
    }
}
