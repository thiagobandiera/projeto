<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Administrador',
            'email'     => 'adm@adm.com',
            'password'  => bcrypt('123'),
        ]);

        User::create([
            'name'      => 'usuario',
            'email'     => 'usuario@usuario.com',
            'password'  => bcrypt('123'),
        ]);
    }
}
