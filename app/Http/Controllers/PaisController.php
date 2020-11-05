<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use Auth;
use DB;

class PaisController extends Controller
{
     public function index(){
    	if (Auth::check()) {
    		$pais = Pais::all();
    		return view('admin.pais')->with('pais',$pais);	
    	}else{
    		return view('auth.login');
    	}
    }


     public function add(Request $request){
        try {

            $id1 = 0;
            $sql = DB::table('pais')->select('id')->where('nombre',$request->get("nombre"))->get();
            foreach ($sql as $value) {
                $id1 = $value->id;
            }

            if($id1==0){
                $pais = new Pais();
                $pais->nombre = $request->get("nombre");
                $pais->save();
                return "0";    
            }else{
                return "2";
            }     
        } catch (Exception $e) {
            return "1";
        }
    }

    public function consultar($id){

        $sql = DB::table('pais')->where('id',$id)->get();
        return $sql;
    }

    public function modificar(Request $request){
     try {
      $pais = Pais::find($request->get("id"));
      $pais->nombre = $request->get('nombre');
      $pais->update();
   
    return "0";
  
        } catch (Exception $e) {
      return "1";      
       }
    
     }

    //**Funcion para eliminar funciona**/

  public function eliminar($id) {
    try {
        $pais = DB::table('pais')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
    }

  }
}
