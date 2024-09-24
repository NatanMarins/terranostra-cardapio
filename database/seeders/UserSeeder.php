<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'natan@teste.com.br')->first()) {
            $superAdmin = User::create([
                'name' => 'natan',
                'email' => 'natan@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'empresa_id' => 1,
            ]);

            // Atribuindo papel para usuário
            $superAdmin->assignRole('Super Admin');
        }
        
        if (!User::where('email', 'manu@teste.com.br')->first()) {
            $user = User::create([
                'name' => 'manu',
                'email' => 'manu@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'empresa_id' => 1,
            ]);

            // Atribuindo papel para usuário
            $user->assignRole('User');
        }
        
        if (!User::where('email', 'bruna@teste.com.br')->first()) {
            $admin = User::create([
                'name' => 'bruna',
                'email' => 'bruna@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'empresa_id' => 1,
            ]);

            // Atribuindo papel para usuário
            $admin->assignRole('Admin');
        }
        
        if (!User::where('email', 'ronaldo@teste.com.br')->first()) {
            User::create([
                'name' => 'ronaldo',
                'email' => 'ronaldo@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'empresa_id' => 1,
            ]);

            // Atribuindo papel para usuário
            $admin->assignRole('Admin');
        }

        if (!User::where('email', 'benjamin@teste.com.br')->first()) {
            $admin = User::create([
                'name' => 'Benjamin',
                'email' => 'benjamin@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'empresa_id' => 2,
            ]);

            // Atribuindo papel para usuário
            $admin->assignRole('Admin');
        }

        if (!User::where('email', 'gamora@teste.com.br')->first()) {
            $admin = User::create([
                'name' => 'Gamora',
                'email' => 'gamora@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'empresa_id' => 2,
            ]);

            // Atribuindo papel para usuário
            $admin->assignRole('Admin');
        }

        if (!User::where('email', 'anakin@teste.com.br')->first()) {
            $admin = User::create([
                'name' => 'Anakin',
                'email' => 'anakin@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'empresa_id' => 2,
            ]);

            // Atribuindo papel para usuário
            $admin->assignRole('User');
        }
    }
}
