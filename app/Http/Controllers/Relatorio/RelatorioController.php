<?php

namespace App\Http\Controllers\Relatorio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\ContaRepository;

use PDF;

use App\Exports\RelatoriosExport;
use Maatwebsite\Excel\Facades\Excel;

class RelatorioController extends Controller
{
    public function fluxoCaixa()
    {
        $Contarepository = new ContaRepository;
    	$contas = $Contarepository->list();

    	return view('relatorio.fluxoCaixa', compact('contas'));
    }

    public function fluxoCaixaGerar(Request $request)
    {
        switch ($request->formato) {
            case 'PDF':
                return $this->pdf($request->conta_id);
                break;
            case 'Excel':
                return $this->excel();
                break;
        }
    }

    public function pdf($id_conta)
    {
        $Contarepository = new ContaRepository;

        $conta = $Contarepository->fluxoCaixa($id_conta);

        $pdf = PDF::loadView('relatorio.fluxoCaixaPDF', compact('conta'));
        return $pdf->setPaper('A4')->stream('fluxo_caixa_pdf');
    }

    public function excel()
    {
        return Excel::download(new RelatoriosExport, 'relatorios.xlsx');
    }


}
