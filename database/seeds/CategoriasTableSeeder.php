<?php

use Illuminate\Database\Seeder;

use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'name'        => 'Casa',
            'user_id'     => 1,
	    ]);

        Categoria::create([
            'name'        => 'Trabalho',
            'user_id'     => 1,
	    ]);

        Categoria::create([
            'name'        => 'Agua',
            'categoria_id'	  => 1,
            'user_id'     => 1,
	    ]);

        Categoria::create([
            'name'        => 'Luz',
            'categoria_id'	  => 1,
            'user_id'     => 1,
	    ]);

        Categoria::create([
            'name'        => 'Salario',
            'categoria_id'	  => 2,
            'user_id'     => 1,
	    ]);

        Categoria::create([
            'name'        => 'Hora Extra',
            'categoria_id'	  => 2,
            'user_id'     => 1,
	    ]);
    }
}
