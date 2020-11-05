<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Feligreses;
use App\Models\Evento;
use App\Models\Prueba;
use Auth;
use DB;


class AsistenciaController extends Controller
{
    
     public function index(){
    	if (Auth::check()) {           
           
            //$prueba = Prueba::all();
            $asistencia = Asistencia::all();

            $prueba = DB::table('prueba')->select('prueba.*','feligreses.nombre as feligres','feligreses.apellido','evento.nombre as evento')->join('feligreses','feligreses.id','=','prueba.feligreses_id')->join('evento','evento.id','=','prueba.evento_id')->where('fecha','=',date('Y-m-d'))->get();

            
            $evento = Evento::all();
            $evento1 = Evento::all();
            $feligreses = Feligreses::all();
            $feligreses1 = Feligreses::all();
            

 

    return view('admin.asistencia')->with('asistencia',$asistencia)->with('prueba',$prueba)->with('feligreses',$feligreses)->with('evento',$evento)->with('evento1',$evento1)->with('feligreses1',$feligreses1);
    	}else{
    		return view('auth.login');
    	}
    }

    public function add(Request $request){
        try {

    
            $id1 = 0;
            $sql = DB::table('prueba')->select('id')->where('evento_id',$request->get("evento"))->get();
           /* foreach ($sql as $value) {
                $id1 = $value->id;
            } */

            if($id1==0){
                $correo = $request->get('persona');
                $correo1 = "";
                for ($i=0; $i < count($request->get('persona')); $i++) { 
                    $prueba = new Prueba();
                    $prueba->evento_id = $request->get("evento");  
                    $prueba->feligreses_id = $correo[$i];                              
                    $prueba->fecha = $request->get("fecha");                 
                    $prueba->save();
                }  
                return "0";    
            }else{
                return "2";
            }

            
        } catch (Exception $e) {
            return "1";
        }
    }

       public function consultar($id){
       // $sql = DB::table('prueba')->where('id',$id)->get();
                 $prueba = DB:: table ('prueba')->select('prueba.*','Feligreses.id as Feligreses','evento.id as evento')->join('evento','evento.id','=','prueba.evento_id')->join('Feligreses','Feligreses.id','=','prueba.feligreses_id')->where('prueba.id',$id)->get();

      return $prueba;
       // return $sql;
    }


     public function modificar(Request $request){
        try {

      $prueba = Prueba::find($request->get("id"));

                    $prueba->evento_id = $request->get("evento");  
                    $prueba->feligreses_id = $request->get("persona");                               
                    $prueba->fecha = $request->get("fecha");                 
                    $prueba->update();
    
   
        return "0";
  
        } catch (Exception $e) {
        return "1";      
    }
        
     } 


    public function eliminar($id) {
    try {
        $tipo = DB::table('prueba')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
        }
    }
 
}
