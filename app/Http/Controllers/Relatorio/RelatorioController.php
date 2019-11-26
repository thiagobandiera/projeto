<?php

namespace App\Http\Controllers\Relatorio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\ContaRepositoryInterface;

use PDF;

class RelatorioController extends Controller
{
    public function fluxoCaixa(ContaRepositoryInterface $conta)
    {
    	$contas = $conta->list();

    	return view('relatorio.fluxoCaixa', compact('contas'));
    }

    public function fluxoCaixaGerar(Request $request, ContaRepositoryInterface $conta)
    {

     	$conta = $conta->getById($request->conta_id);

    	$pdf = PDF::loadView('relatorio.fluxoCaixaGerar', compact('conta'));

    	return $pdf->setPaper('A4')->stream('fluxo_caixa_pdf');
    }
}
