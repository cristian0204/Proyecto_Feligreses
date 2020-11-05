<?php
   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role_User;
use App\Models\Usuario;
/*use App\Models\Roles;*/
use App\Models\Role;
use App\User;
use Auth;
use DB;

class RolesUsuarioController extends Controller
{
    
       public function index(){ 
    	if (Auth::check()) {
    		$rolesUsuario = Role_User::all();
                            
        $rolesUsuario = DB:: table ('role_user')->select('role_user.*','users.name as users','roles.name as roles')->join('users','users.id','=','role_user.user_id')->join('roles','roles.id','=','role_user.role_id')->get();

  
              $roles = Role::all();
              $users = User::all();
    		    		
    		return view('admin.rolesUsuario')->with('rolesUsuario',$rolesUsuario)->with('roles', $roles)->with('users',$users);	
        	}else{
    		return view('auth.login');
    	}
    }


         public function add(Request $request){
        try {

            $id1 = 0;
            $sql = DB::table('role_user')->select('user_id')->where('user_id',$request->get("usuario"))->get();

          
            foreach ($sql as $value) {
                $id1 = $value->user_id;
            }

            if($id1==0){
                $rolesUsuario = new Role_User();
                $rolesUsuario->user_id = $request->get("usuario");
                $rolesUsuario->role_id = $request->get("rol");                
                
                $rolesUsuario->save();
                return "0";    
            }else{
                return "2";
            }

            
        } catch (Exception $e) {
            return "1";
        }
    }

    public function eliminar($id) {
    try {
        $rolesUsuario = DB::table('role_user')->where('user_id',$id)->delete(); 
        return "0";
    } catch (Exception $e) {
        return '1';  
    }
}

 
} 
