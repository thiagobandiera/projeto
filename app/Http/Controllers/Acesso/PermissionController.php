<?php

namespace App\Http\Controllers\Acesso;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$permissions = Permission::all();

    	return view('acesso.permission.index', compact('permissions'));
    }

    public function create()
    {
    	return view('acesso.permission.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        $permission = Permission::create(['name' => $request->name]);

		if ($permission)
			return redirect()
                ->route('permission.index')
                ->with('success', 'Permissão Cadastrado');
			

    	return redirect()
                    ->back()
                    ->with('error', 'Erro ao cadastrar a permissão');
    }

    public function show($id)
    {
    	$permission = Permission::find($id);

    	return view('acesso.permission.show', compact('permission'));
    }

    public function edit($id)
    {
    	$permission = Permission::find($id);

    	return view('acesso.permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();

        return redirect()
        			->route('permission.index')
                    ->with('success','Permissão editada');

    }

    public function destroy($id)
    {
    	$response = Permission::destroy($id);

        if ($response)
            return redirect()
                        ->route('permission.index')
                        ->with('success', 'Permissão apagada');


        return redirect()
                    ->back()
                    ->with('error', 'Erro ao apagar a permissão');
    }
}
