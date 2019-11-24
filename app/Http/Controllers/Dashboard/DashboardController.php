<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Session;
use App\Repositories\Contracts\ContaRepositoryInterface;

class DashboardController extends Controller
{
	protected $conta;

	public function __contruct()
	{
		$this->middleware('auth');
	}
    public function index()
    {

    	$userOnline = Session::registered()->count();

        $user = auth()->user()->contas;

    	$saldoTotal = 0;
        foreach ($user as $saldo) {
            $saldoTotal += $saldo->saldo_atual;
        }

    	return view('dashboard.index', compact('userOnline', 'saldoTotal'));
    }
}
