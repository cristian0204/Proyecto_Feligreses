<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles; 
use Auth;
use DB;

class RolesController extends Controller
{
    
public function index(){
    	if (Auth::check()) {
    		$roles= Roles::all();
    		return view('admin.roles')->with('roles',$roles);	
    	}else{
    		return view('auth.login');
    	}
    }
  
        public function add(Request $request){
        try {

            $id1 = 0;
            $sql = DB::table('roles')->select('id')->where('name',$request->get("nombre"))->get();
            foreach ($sql as $value) {
                $id1 = $value->id;
            }

            if($id1==0){
                $roles = new Roles();
                $roles->name = $request->get("nombre");
                $roles->display_name = $request->get("nombre");
                $roles->description = $request->get("descripcion");
                $roles->save();
                return "0";    
            }else{
                return "2";
            }

            
        } catch (Exception $e) {
            return "1";
        }
    }

        public function consultar($id){
        $sql = DB::table('roles')->where('id',$id)->get();
        return $sql;
    }

     public function modificar(Request $request){
    try {
      $roles = Roles::find($request->get("id"));

      $roles->name = $request->get("nombre");
      $roles->display_name = $request->get("nombre");
      $roles->description = $request->get("descripcion");
      $roles->update();
   
    return "0";
  
    } catch (Exception $e) {
    return "1";      
    }
    
 }

    public function eliminar($id) {
    try {
        $roles = DB::table('roles')->where('id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
    }


}

}
