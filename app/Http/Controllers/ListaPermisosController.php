<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaPermisos; 
use Auth;
use DB;

class ListaPermisosController extends Controller
{
    
public function index(){
    	if (Auth::check()) {
    		$listaPermisos= ListaPermisos::all();
    		return view('admin.listaPermisos')->with('listaPermisos',$listaPermisos);	
    	}else{
    		return view('auth.login');
    	}
    }

}
