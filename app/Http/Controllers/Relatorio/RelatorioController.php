<?php

namespace App\Http\Controllers\Relatorio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\ContaRepositoryInterface;

use PDF;

use Excel;

class RelatorioController extends Controller
{
    public function fluxoCaixa(ContaRepositoryInterface $conta)
    {
    	$contas = $conta->list();

    	return view('relatorio.fluxoCaixa', compact('contas'));
    }

    public function fluxoCaixaGerar(Request $request, ContaRepositoryInterface $conta)
    {

     	$conta = $conta->fluxoCaixa($request->conta_id);

        //dd($conta->transacoes);

    	//$pdf = PDF::loadView('relatorio.fluxoCaixaGerar', compact('conta'));
    	//return $pdf->setPaper('A4')->stream('fluxo_caixa_pdf');


    }


}
