<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosFamiliares;
use Auth;

class DatosFamiliaresController extends Controller
{
    
public function index(){
    	if (Auth::check()) {
    		$datos = DatosFamiliares::all();
    		return view('admin.datos')->with('datos',$datos);	
    	}else{
    		return view('auth.login');
    	}
    }

} 

