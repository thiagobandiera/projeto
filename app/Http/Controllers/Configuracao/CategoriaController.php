<?php

namespace App\Http\Controllers\Configuracao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\CategoriaRepositoryInterface;
use App\Http\Requests\CategoriaFormRequest;

class CategoriaController extends Controller
{

    protected $categoria;

    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct(CategoriaRepositoryInterface $categoria)
    {
        $this->middleware('auth');

        $this->categoria = $categoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = $this->categoria->all();

        return view('Configuracao.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias_pai = $this->categoria->categoriaPaiList();

        return view('Configuracao.categoria.create', compact('categorias_pai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaFormRequest $request)
    {
        $validated = $request->validated();

        $request['user_id'] = auth()->user()->id;

        $response = $this->categoria->save($request->all());
       
        if ($response)
            return redirect()
                        ->route('categoria.index')
                        ->with('success', 'Categoria Cadastrado');


        return redirect()
                    ->back()
                    ->with('error', 'Erro ao cadastrar a categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = $this->categoria->getById($id);

        return view('Configuracao.categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias_pai = $this->categoria->categoriaPaiList();

        $categoria = $this->categoria->getById($id);

        return view('Configuracao.categoria.edit', compact('categoria' ,'categorias_pai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaFormRequest $request, $id)
    {
        $validated = $request->validated();
        
        $response = $this->categoria->update($id, $request->all());

        if ($response)
            return redirect()
                        ->route('categoria.index')
                        ->with('success', 'Categoria editado');


        return redirect()
                    ->back()
                    ->with('error', 'Erro ao editar a categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->categoria->delete($id);

        if ($response)
            return redirect()
                        ->route('categoria.index')
                        ->with('success', 'Categoria apagada');


        return redirect()
                    ->back()
                    ->with('error', 'Erro ao apagar a categoria');

    }
}
