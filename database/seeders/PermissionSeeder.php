<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Permissões menu
            'index-cardapio',
            'show-cardapio',
            'create-cardapio',
            'edit-cardapio',
            'destroy-cardapio',

            // Permissões categoria
            'index-categoria',
            'show-categoria',
            'create-categoria',
            'edit-categoria',
            'destroy-categoria',

            // Permissões empresa
            'index-empresa',
            'show-empresa',
            'create-empresa',
            'edit-empresa',
            'destroy-empresa',

            // Permissões usuario
            'index-usuario',
            'show-usuario',
            'create-usuario',
            'edit-usuario',
            'destroy-usuario',
        ];

        foreach($permissions as $permission){
            $existingPermission = Permission::where('name', $permission)->first();

            if(!$existingPermission){
                Permission::create([
                    'name' => $permission,
                    'guard_name' => 'web',
                ]);
            }
        }
    }
}
