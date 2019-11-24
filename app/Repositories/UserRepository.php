<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use App\Models\Session;

use App\Log\LogEngine;

class UserRepository implements UserRepositoryInterface
{
    protected $log;

    public function __construct($value='')
    {
        $this->log = new LogEngine();
    }

    public function all()
    {
        return User::all();
    }

    public function getById($user_id)
    {
        return User::Where('id', $user_id)->with('roles')->first();
    }

    public function save(array $user_data)
    {
        $registro = User::create($user_data);

        $this->log->registro($user_data, 'create', $registro, 'users');

        return $registro;
    }

    public function delete($user_id)
    {
        $registro = User::find($user_id);

        $this->log->registro($registro, 'delete', $registro, 'users');

        return User::destroy($user_id);
    }

    public function update($user_id, array $user_data)
    {
        $data_anterior = User::find($user_id);

        $this->log->registro($user_data, 'update', $data_anterior, 'users', $data_anterior);

        $registro = User::find($user_id)->update($user_data);

        return $registro;
    }

    public function userOnline(){

        $userOnline = Session::all();

        return $userOnline;
    }
}