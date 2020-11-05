<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Auth;
use DB;


class EventoController extends Controller
{
    
     public function index(){
    	if (Auth::check()) {
    		$evento = Evento::all();
    		return view('admin.evento')->with('evento',$evento);	
    	}else{
    		return view('auth.login');
    	}
    }

    public function add(Request $request){
        try {

            $id1 = 0;
            $sql = DB::table('evento')->select('id')->where('nombre',$request->get("nombre"))->get();
            foreach ($sql as $value) {
                $id1 = $value->id;
            }

            if($id1==0){
                $evento = new Evento();
                $evento->nombre = $request->get("nombre");
                $evento->descripcion = $request->get("descripcion");
                $evento->save();
                return "0";     
            }else{
                return "2";
            }

            
        } catch (Exception $e) {
            return "1";
        }
    }



 public function modificar(Request $request){
    try {
      $evento = Evento::find($request->get("id"));

     $evento->nombre = $request->get('nombre');
     $evento->descripcion = $request->get('descripcion');
     $evento->update();
   
    return "0";
  
    } catch (Exception $e) {
return "1";      
    }
    
 }


    public function consultar($id){
        $sql = DB::table('evento')->where('id',$id)->get();
        return $sql;
    }

//**Funcion para eliminar funciona**/


public function eliminar($id) {
    try {
        $evento = DB::table('evento')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
    }

}
}
