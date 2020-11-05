<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Feligreses;
use App\Models\Evento;
use App\Models\Prueba;
use Auth;
use DB;


class ConsultarAsistenciaController extends Controller
{
    
     public function index(){
    	if (Auth::check()) {           
           
            $prueba = Prueba::all();
            $consultar = Prueba::all();
            $evento = Evento::all();
            $feligreses = Feligreses::all();

            

    return view('admin.consultar')->with('consultar',$consultar)->with('prueba',$prueba)->with('feligreses',$feligreses)->with('evento',$evento);
    	}else{
    		return view('auth.login');
    	}
    }

    public function eliminar($id) {
    try {
        $consultar = DB::table('prueba')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
        }
    }

    public function consultar(Request $request){

        // $sql = DB::table('prueba')->where('id',$id)->get();
       // SELECT id, feligreses_id, evento_id, fecha FROM prueba WHERE evento_id=3;

        // $consultar->evento_id = $request->get("evento");
         //$consultar->fecha = $request->get("fecha"); ('prueba.*','feligreses.nombre as feligres','feligreses.apellido','evento.nombre as evento')->join('feligreses','feligreses.id','=','prueba.feligreses_id')->join('evento','evento.id','=','prueba.evento_id')

         $consultar = DB::table('prueba')->select('prueba.*','feligreses.nombre as feligres','feligreses.apellido','evento.nombre as evento')->join('feligreses','feligreses.id','=','prueba.feligreses_id')->join('evento','evento.id','=','prueba.evento_id')->where('evento_id',$request->get("evento"))->where('fecha',$request->get("fecha"))->get();

        return $consultar;

    }
 
}
