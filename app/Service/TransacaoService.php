<?php

namespace App\Service;

use App\Repositories\Contracts\TransacaoRepositoryInterface;
use App\Repositories\Contracts\ContaRepositoryInterface;

class TransacaoService
{
	private $repository;
	private $contaRepository;

    public function __construct(TransacaoRepositoryInterface $repository, ContaRepositoryInterface $contaRepository)
    {
        $this->repository = $repository;
        $this->contaRepository = $contaRepository;
    }

    public function store($data)
    {
        try {

    	    $data['user_id'] = auth()->user()->id;
          
            $this->repository->save($data);

            $conta = $this->contaRepository->getById($data['conta_id']);

            switch ($data['tipo']) {
                case 'O':
                    $conta->saldo_atual -= $data['valor'];
                    break;
                case 'I':
                    $conta->saldo_atual += $data['valor'];
                    break;  
                case "T" :
                    $conta->saldo_atual -= $data['valor'];

                    $conta_transfer = $this->contaRepository->getById($data['conta_id_transaction']);

                    $conta_transfer->saldo_atual += $data['valor'];

                    $conta_transfer->save();

                    break;
            }

            $conta->save();

            return true;
            
        } catch (Exception $e) {
            return false;
        }    	
    }

    public function update($data, $id)
    {
        try {

            //Atualiza o saldo atual da conta
                $transacao = $this->repository->getById($id);

                $conta = $this->contaRepository->getById($data['conta_id']);

                switch ($transacao->tipo) {
                    case 'O':
                        $conta->saldo_atual += $transacao->valor;
                        break;
                    case 'I':
                        $conta->saldo_atual -= $transacao->valor;
                        break;   
                }

                switch ($data['tipo']) {
                    case 'O':
                        $conta->saldo_atual -= $data['valor'];
                        break;
                    case 'I':
                        $conta->saldo_atual += $data['valor'];
                        break;   
                }

                $conta->save();

            //Atualiza a transação
            $data['user_id'] = auth()->user()->id;

            $this->repository->update($id, $data);

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $transacao = $this->repository->getById($id);

            $this->repository->delete($id);

            $conta = $this->contaRepository->getById($transacao->conta_id);

            switch ($transacao->tipo) {
                case 'O':
                    $conta->saldo_atual += $transacao->valor;
                    break;
                case 'I':
                    $conta->saldo_atual -= $transacao->valor;
                    break;   
            }

            $conta->save();

            return true;
            
        } catch (Exception $e) {
            return false;
        }
    }
}