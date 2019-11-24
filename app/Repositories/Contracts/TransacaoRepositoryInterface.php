<?php

namespace App\Repositories\Contracts;

interface TransacaoRepositoryInterface
{
    public function all();

    public function getById($transacao_id);

    public function save($transacao_data);

    public function delete($transacao_id);

    public function update($transacao_id, array $transacao_data);
}