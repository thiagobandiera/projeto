<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AcessoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'sistema']);
        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.show']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.destroy']);

        Permission::create(['name' => 'role.index']);
        Permission::create(['name' => 'permission.index']);
        
        Permission::create(['name' => 'configuracao']);
        Permission::create(['name' => 'conta.index']);
        Permission::create(['name' => 'categoria.index']);

        Permission::create(['name' => 'transacao.index']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'usuario'])
            ->givePermissionTo(['configuracao','conta.index','categoria.index','transacao.index']);

        //assing user and role
        $user = User::find(1);
        $user->assignRole(1);

        $user = User::find(2);
        $user->assignRole(2);


    }
}
