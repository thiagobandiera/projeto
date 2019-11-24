<?php

namespace App\Repositories\Contracts;

interface CategoriaRepositoryInterface
{
    public function all();
    public function categoriaPaiAll();
    public function categoriaPaiList();
    public function getById($categoria_id);
    public function save(array $categoria_data);
    public function delete($categoria_id);
    public function update($categoria_id, array $categoria_data);
}