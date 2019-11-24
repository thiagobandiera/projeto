<?php

namespace App\Http\Controllers\Acesso;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use DB;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$roles = Role::all();

    	return view('acesso.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();

    	return view('acesso.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {

    	$this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    	   		
		$role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->input('permission'));

		if ($role)
			return redirect()
                ->route('role.index')
                ->with('success', 'Perfil Cadastrado');
			

    	return redirect()
                    ->back()
                    ->with('error', 'Erro ao cadastrar o perfil');
    }

    public function show($id)
    {
    	$role = Role::with('permissions')->find($id);

    	return view('acesso.role.show', compact('role'));
    }

    public function edit($id)
    {
    	$role = Role::with('permissions')->find($id);

        $permissions = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
   	
        return view('acesso.role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()
        			->route('role.index')
                    ->with('success','Perfil editado');

    }

    public function destroy($id)
    {
    	$response = Role::destroy($id);

        if ($response)
            return redirect()
                        ->route('role.index')
                        ->with('success', 'Perfil apagado');


        return redirect()
                    ->back()
                    ->with('error', 'Erro ao apagar o perfil');
    }
}
