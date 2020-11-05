<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsPermisos; 
use App\Models\Permission;
/*
use App\Models\Roles;
use App\Models\Permisos;
*/
use App\Models\Role;
use Auth;
use DB;

class AsPermisosController extends Controller
{
    
public function index(){
      if (Auth::check()) {
        $asPermisos= AsPermisos::all();

        $asPermisos = DB:: table ('permission_role')->select('permission_role.*','permissions.name as permissions','roles.name as roles')->join('permissions','permissions.id','=','permission_role.permission_id')->join('roles','roles.id','=','permission_role.role_id')->get();


        $permissions = Permission::all();
        /*$roles = Roles::all();
        $permissions = Permisos::all();
        */
        $rol = Role::all();

        return view('admin.asPermisos')->with('asPermisos',$asPermisos)->with('permissions',$permissions)->with('rol',$rol); 
      }else{
        return view('auth.login');
      }
    }

    /**---------------------------------------------------------------------------------------------***/

    public function permisoxrol($id)
    {
        $datapermi=[];
        $permisosotorgados = DB::table('permission_role')
                                ->select('permissions.display_name as nombre_permiso','permission_role.role_id','permission_role.permission_id')
                                ->leftjoin('permissions','permissions.id','=','permission_role.permission_id')
                                ->where('permission_role.role_id','=',$id)
                                ->get();
        $permisossinotorgar = DB::select(DB::raw('SELECT id, name, display_name, description from permissions WHERE id not in (SELECT permission_id FROM permission_role where role_id='.$id.')'));

       array_push($datapermi, $permisosotorgados,$permisossinotorgar);
       return $datapermi;
    }

    public function create(Request $request)
    {
        try
        {
            $rolotorgado = $request->get('rolotorgado');
            $rol_id = $request->get('rol_id');
            $rol = Role::where('Id','=',$rol_id)->first();
            $rol->perms()->sync($rolotorgado);
            
            return redirect('AsPermisos');
        
        
        }
        catch(\Exception $e)
        {
                       
            return redirect('AsPermisos');

        }
    }

}
