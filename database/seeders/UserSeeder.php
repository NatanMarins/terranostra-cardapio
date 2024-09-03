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
            User::create([
                'name' => 'natan',
                'email' => 'natan@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        
        if (!User::where('email', 'manu@teste.com.br')->first()) {
            User::create([
                'name' => 'manu',
                'email' => 'manu@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        
        if (!User::where('email', 'bruna@teste.com.br')->first()) {
            User::create([
                'name' => 'bruna',
                'email' => 'bruna@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        
        if (!User::where('email', 'ronaldo@teste.com.br')->first()) {
            User::create([
                'name' => 'ronaldo',
                'email' => 'ronaldo@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
    }
}
