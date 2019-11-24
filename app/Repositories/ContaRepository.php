<?php

namespace App\Repositories;

use App\Repositories\Contracts\ContaRepositoryInterface;
use App\Models\Conta;

use App\Log\LogEngine;

class ContaRepository implements ContaRepositoryInterface
{
    public function __construct()
    {
        $this->log = new LogEngine();
    }

	public function getByUser()
    {
        return Conta::where('user_id', auth()->user()->id)->get();
    }

    public function getById($conta_id)
    {
    	return Conta::find($conta_id);
    }

    public function list()
    {
        return Conta::where('user_id', auth()->user()->id)->pluck('name', 'id');
    }

    public function saldo()
    {
        return 1;
    }

    public function all()
    {
        return Conta::all();
    }

    public function save(array $conta_data)
    {
        $registro = Conta::create($conta_data);

        $this->log->registro($conta_data, 'create', $registro, 'contas');

        return $registro;
    }

    public function delete($conta_id)
    {
        $registro = Conta::find($conta_id);

        $this->log->registro($registro, 'delete', $registro, 'contas');

        return Conta::destroy($conta_id);
    }

    public function update($conta_id, array $conta_data)
    {
        $data_anterior = Conta::find($conta_id);

        $this->log->registro($conta_data, 'update', $data_anterior, 'contas', $data_anterior);

        $registro = Conta::find($conta_id)->update($conta_data);

        return $registro;
    }

}