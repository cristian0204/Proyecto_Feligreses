<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Pais;
use Auth;
use DB;

class DepartamentoController extends Controller{
      
       public function index(){
    	if (Auth::check()) {
    		$departamento = Departamento::all();
            $departamento = DB::table('departamento')->select('departamento.*','pais.nombre as pais')->join('pais','pais.id','=','departamento.pais_id')->get();

    		 $pais = Pais::all();
             $pais1 = Pais::all();
             
    		return view('admin.departamento')->with('departamento',$departamento)->with('pais',$pais)->with('pais1',$pais1);    	
    	}else{
    		return view('auth.login');
    	}
    }

      public function add(Request $request){
        try {

            $id1 = 0;
            $sql = DB::table('departamento')->select('id')->where('nombre',$request->get("nombre"))->where('pais_id',$request->get("pais_id"))->get();
            foreach ($sql as $value) {
                $id1 = $value->id;
            }

            if($id1==0){
                $departamento = new Departamento();
                $departamento->nombre = $request->get("nombre");
                $departamento->pais_id = $request->get("pais_id");
                $departamento->save();
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
      $departamento = Departamento::find($request->get("id"));

     $departamento->nombre = $request->get('nombre');
     $departamento->pais_id = $request->get("pais_id");
     $departamento->update();
   
    return "0";
  
    } catch (Exception $e) {
     return "1";      
    }
    
    }

    public function consultar($id){
        $sql = DB::table('departamento')->where('id',$id)->get();
        return $sql;
    }

    public function departamento($id){
        $sql = DB::table('departamento')->where('pais_id',$id)->get();
        return $sql;
    }

    public function eliminar($id) {
    try {
        $tipo = DB::table('departamento')->where('id',$id)->delete(); 
        return "0";
        } catch (Exception $e) {
            return '1';  
            } 
    }
        
}
