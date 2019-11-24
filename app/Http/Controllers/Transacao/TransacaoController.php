<?php

namespace App\Http\Controllers\Transacao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\TransacaoRepositoryInterface;
use App\Repositories\Contracts\ContaRepositoryInterface;
use App\Repositories\Contracts\CategoriaRepositoryInterface;

use App\Service\TransacaoService;

class TransacaoController extends Controller
{
    protected $repository;
    protected $service;

    public function __construct(TransacaoRepositoryInterface $repository, TransacaoService $service)
    {
        $this->middleware('auth');

        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
    	$transacoes = $this->repository->all();

        return view('transacao.index', compact('transacoes'));
    }

    public function create(ContaRepositoryInterface $conta, CategoriaRepositoryInterface $categoria)
    {
    	$contas = $conta->list();
    	$categorias = $categoria->GroupList();

    	return view('transacao.create', compact('contas', 'categorias'));
    }

    public function store(Request $request)
    {
    	$response = $this->service->store($request->all());

    	if ($response)
            return redirect()
                        ->route('transacao.index')
                        ->with('success', 'Transação Cadastrada');


        return redirect()
                    ->back()
                    ->with('error', 'Erro ao cadastrar a transação');
    }

    public function show($id)
    {
        $transacao = $this->repository->getById($id);

        return view('transacao.show', compact('transacao'));
    }

    public function destroy($id)
    {
    	$response = $this->service->destroy($id);

    	if ($response)
            return redirect()
                        ->route('transacao.index')
                        ->with('success', 'Transação deletada');


        return redirect()
                    ->back()
                    ->with('error', 'Erro ao deletar a transação');
    }

    public function edit($id, ContaRepositoryInterface $conta, CategoriaRepositoryInterface $categoria)
    {
    	$transacao = $this->repository->getById($id);

    	$contas = $conta->list();
    	$categorias = $categoria->GroupList();

        return view('transacao.edit', compact('transacao', 'categorias', 'contas'));
    }

    public function update(Request $request, $id)
    {
    	$response = $this->service->update($request->all(), $id);

    	if ($response)
            return redirect()
                        ->route('transacao.index')
                        ->with('success', 'Transação Alterada');


        return redirect()
                    ->back()
                    ->with('error', 'Erro ao alterar a transação');
    }
}
