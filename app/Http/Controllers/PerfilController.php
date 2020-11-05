<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Usuario;
use Auth;
use Hash;
use DB;

class PerfilController extends Controller
{
     public function index(){
      if (Auth::check()) {
        $perfil = Perfil::all();
        $usuario= Usuario::all();
        return view('admin.perfil')->with('perfil',$perfil);  
      }else{
        return view('auth.login');
      }
    }

     public function consultar($id){
        $sql = DB::table('users')->where('id',$id)->get();
        return $sql;
    }


    
}
