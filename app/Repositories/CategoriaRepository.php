<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoriaRepositoryInterface;
use App\Models\Categoria;

class CategoriaRepository implements CategoriaRepositoryInterface
{

    public function all()
    {
        return Categoria::Where('user_id', auth()->user()->id)->with('categoriaPai')->orderBy('name', 'ASC')->get();
    }

    public function categoriaPaiAll()
    {
        return Categoria::where([['categoria_id', null],['user_id', auth()->user()->id]])->get();      
    }

    public function categoriaPaiList()
    {
        return Categoria::where([['categoria_id', null],['user_id', auth()->user()->id]])->pluck('name', 'id');
    }

    public function GroupList()
    {
        $categorias = Categoria::where([['categoria_id', null],['user_id', auth()->user()->id]])->pluck('name', 'id');

        foreach ($categorias as $key => $categoria) {
            $subcategoria = Categoria::where([['categoria_id', $key],['user_id', auth()->user()->id]])->pluck('name', 'id');
            $categoriaGroup[$categoria] = $subcategoria;
        }

        return $categoriaGroup;
    }

    public function getById($categoria_id)
    {
        return Categoria::Where('id', $categoria_id)->with('categoriaPai')->first();
    }

    public function save(array $categoria_data)
    {
        return Categoria::create($categoria_data);
    }

    public function delete($categoria_id)
    {
        return Categoria::destroy($categoria_id);
    }

    public function update($categoria_id, array $categoria_data)
    {
        return Categoria::find($categoria_id)->update($categoria_data);
    }

}