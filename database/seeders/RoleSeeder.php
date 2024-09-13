<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Role::where('name', 'Super Admin')->first()) {
            Role::create([
                'name' => 'Super Admin',
            ]);
        }


        if (!Role::where('name', 'Representante Admin')->first()) {
            $admin = Role::create([
                'name' => 'Representante Admin',
            ]);

            // Dar permissão para o papel
            $admin->givePermissionTo([
                'index-cardapio',
                'show-cardapio',
                'create-cardapio',
                'edit-cardapio',
                'destroy-cardapio',

                'index-categoria',
                'show-categoria',
                'create-categoria',
                'edit-categoria',
                'destroy-categoria',

                'index-usuario',
                'show-usuario',
                'create-usuario',
                'edit-usuario',
                'destroy-usuario',
            ]);
        }


        if (!Role::where('name', 'Admin')->first()) {
            $admin = Role::create([
                'name' => 'Admin',
            ]);

            // Dar permissão para o papel
            $admin->givePermissionTo([
                'index-cardapio',
                'show-cardapio',
                'create-cardapio',
                'edit-cardapio',
                'destroy-cardapio',

                'index-categoria',
                'show-categoria',
                'create-categoria',
                'edit-categoria',
                'destroy-categoria',

                'index-usuario',
                'show-usuario',
            ]);
        }



        if (!Role::where('name', 'User')->first()) {
            $user = Role::create([
                'name' => 'User',
            ]);

            // Dar permissão para o papel
            $user->givePermissionTo([
                'index-cardapio',
                'show-cardapio',

                'index-categoria',
                'show-categoria',

                'index-usuario',
                'show-usuario',
            ]);
        }
    }
}
