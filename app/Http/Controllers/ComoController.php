<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Como;
use Auth;
use DB;

class ComoController extends Controller
{
    
public function index(){
    	if (Auth::check()) {
    		$como= Como::all();
    		return view('admin.como')->with('como',$como);	
    	}else{
    		return view('auth.login');
    	}
    }
  
          public function add(Request $request){
        try {

            $id1 = 0;
            $sql = DB::table('como_llego')->select('id')->where('atraves',$request->get("atraves"))->get();
            foreach ($sql as $value) {
                $id1 = $value->id;
            }

            if($id1==0){
                $como = new Como();
                $como->atraves = $request->get("atraves");
                $como->save();
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
      $como = Como::find($request->get("id"));

     $como->atraves = $request->get('nombre');
     $como->update();
   
    return "0";
  
    } catch (Exception $e) {
        return "1";      
        }
    
     }

     public function consultar($id){

      $sql = DB::table('como_llego')->where('id',$id)->get();
      return $sql;
    }

    public function eliminar($id) {
    try {
        $como = DB::table('como_llego')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
    }

}

}
