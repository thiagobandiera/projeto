<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\ProfileFormRequest;

use App\Repositories\Contracts\UserRepositoryInterface;

use Spatie\Permission\Traits\HasRoles;

use Spatie\Permission\Models\Role;

use DB;

use App\Traits\UploadFile;

class UserController extends Controller
{

    use UploadFile, HasRoles;

    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->middleware('auth');

        $this->middleware('permission:user.index');
        $this->middleware('permission:user.create', ['only' => ['create','store']]);
        $this->middleware('permission:user.show', ['only' => ['show']]);
        $this->middleware('permission:user.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user.destroy', ['only' => ['destroy']]);

        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');

        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request['password'] = hash::make($request->password);

        $user = $this->user->save($request->all());

        $user->assignRole($request->role_id);

        if ($user) 
            return redirect()
                        ->route('user.index')
                        ->with('success', 'Usuario cadastrado');

            return redirect()
                        ->back()
                        ->with('error', 'Erro ao cadastrar o usuario');
    }

    public function show($id)
    {
        $user = $this->user->getById($id);

        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->user->getById($id);

        $UserRoles = [];
        foreach ($user->roles as $role) {
            $UserRoles[] = $role->id;
        }

        $roles = Role::all()->pluck('name', 'id');

        return view('user.edit', compact('user', 'roles', 'UserRoles'));
    }

    public function update(Request $request, $id)
    {

        //Atualiza a Senha
        if ($request->password) {
            $request['password'] = hash::make($request->password);
        }else{
            unset($request['password']);
        }

        //Atualiza o Perfil
        if ($request->role_id) {
            DB::table('model_has_roles')->where('model_id',$id)->delete();

            $user = $this->user->getById($id);

            $user->assignRole($request->role_id);
        }
        
        $response = $this->user->update($id, $request->all());
        
        if ($response)
            return redirect()
                        ->route('user.index')
                        ->with('success', 'Atualizado com sucesso!');

        return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar o perfil');
    }

    public function destroy($id)
    {
        $response = $this->user->delete($id);

        if ($response)  
            return redirect()
                        ->route('user.index')
                        ->with('success', 'Usuario apagado');

        return redirect()
                    ->back()
                    ->with('error', 'Erro ao apagar o usuario');
    }

    public function profile()
    {
    	return view('user.profile');
    }

    public function profileUpdate(ProfileFormRequest $request)
    {

        $data = $request->all();

        $nameFile = auth()->user()->id . kebab_case($data['name']);
     
        $data['image'] = $this->upload($request, $nameFile ,'user');

    	$update = auth()->user()->update($data);
        
    	if ($update)
    		return redirect()
    					->route('profile')
    					->with('success', 'Atualizado com sucesso!');

    	return redirect()
    				->back()
    				->with('error', 'Falha ao atualizar o perfil');
    }

    public function password()
    {
        return view('user.password');
    }

    public function passwordUpdate(Request $request)
    {

        $password = auth()->user()->password;

        $dados = $request->all();

        if (Hash::check($dados['password_atual'], $password)) {
            if ($dados['password_nova'] == $dados['password_repitir']) {
    
                auth()->user()->password = Hash::make($dados['password_nova']);

                auth()->user()->save();  

                return redirect()
                    ->route('password')
                    ->with('success', 'Senha atualizado com sucesso!');

            }else{
                return redirect()
                    ->back()
                    ->with('error', 'Senha nova digitado diferente');
            }
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Senha atual incorreta');
        }
    }

    public function online()
    {
        $userOnline = $this->user->userOnline();
      
        return view('user.online', compact('userOnline'));
    }
}
