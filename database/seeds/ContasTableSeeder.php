<?php

use Illuminate\Database\Seeder;

use App\Models\Conta;

class ContasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conta::create([
            'name'        => 'Banco Itau',
            'user_id'     => 1,
            'saldo_inicial'  => 0,
            'saldo_atual'  => 0,
	    ]);

    	Conta::create([
            'name'        => 'Banco Inter',
            'user_id'     => 1,
            'saldo_inicial'  => 0,
            'saldo_atual'  => 0,
	    ]);
    }
}
