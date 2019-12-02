<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use App\Models\Conta;

class RelatoriosExport implements FromView
{

    public function view(): View
    {
        return view('relatorio.fluxoCaixaExcel', [
            'conta' => Conta::where('id',1)
                        ->with(array('transacoes' => function($query){
                            $query->orderBy('data');
                        }))
                        ->first()
        ]);
    }
}
