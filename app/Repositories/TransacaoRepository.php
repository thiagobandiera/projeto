<?php

namespace App\Repositories;

use App\Repositories\Contracts\TransacaoRepositoryInterface;
use App\Models\Transacao;

class TransacaoRepository implements TransacaoRepositoryInterface
{
    public function all()
    {
        return Transacao::Where('user_id', auth()->user()->id)->with('categoria', 'conta_transfer')->get();
    }

    public function getById($transacao_id)
    {
        return Transacao::Where('id',$transacao_id)->with('categoria', 'conta', 'conta_transfer')->first();
    }

    public function save($transacao_data)
    {
        return Transacao::create($transacao_data);
    }

    public function delete($transacao_id)
    {
        return Transacao::destroy($transacao_id);
    }

    public function update($transacao_id, array $transacao_data)
    {
        return Transacao::find($transacao_id)->update($transacao_data);
    }
}