<?php

namespace App\Http\Controllers\Configuracao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\ContaRepositoryInterface;
use App\Http\Requests\ContaFormRequest;

use Illuminate\Support\Facades\Log;

class ContaController extends Controller
{

    protected $conta;

    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct(ContaRepositoryInterface $conta)
    {
        $this->middleware('auth');

        $this->conta = $conta;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contas = $this->conta->getByUser();

        return view('configuracao.conta.index', compact('contas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracao.conta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ContaFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContaFormRequest $request)
    {
        $validated = $request->validated();

        $request['user_id'] = auth()->user()->id;
        $request['saldo_atual'] = $request['saldo_inicial'];

        $response = $this->conta->save($request->all());

        if ($response)
            return redirect()
                        ->route('conta.index')
                        ->with('success', 'Conta Cadastrado');


        return redirect()
                    ->back()
                    ->with('error', 'Erro ao cadastrar a conta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conta = $this->conta->getById($id);

        return view('configuracao.conta.show', compact('conta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conta = $this->conta->getById($id);

        return view('configuracao.conta.edit', compact('conta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ContaFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContaFormRequest $request, $id)
    {
        $validated = $request->validated();

        $conta = $this->conta->getById($id);

        $request['saldo_atual'] = $conta->saldo_atual + ($request['saldo_inicial'] - $conta->saldo_inicial);

        $response = $this->conta->update($id, $request->all());

        if ($response)
            return redirect()
                        ->route('conta.index')
                        ->with('success', 'Conta alterada.');


        return redirect()
                    ->back()
                    ->with('error', 'Erro ao alterar a conta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->conta->delete($id);

        if ($response)
            return redirect()
                        ->route('conta.index')
                        ->with('success', 'Conta deletada');


        return redirect()
                    ->back()
                    ->with('error', 'Erro ao deletar a conta');
    }
}
