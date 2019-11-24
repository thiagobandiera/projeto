<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function all();
    public function getById($user_id);
    public function save(array $user_data);
    public function delete($user_id);
    public function update($user_id, array $user_data);
}