<?php

namespace App\Repositories\Contracts;

interface ContaRepositoryInterface
{
	
    public function getByUser();
    public function getById($conta_id);
    public function list();
    public function saldo();
    public function all();
    public function save(array $conta_data);
    public function delete($conta_id);
    public function update($conta_id, array $conta_data);


}