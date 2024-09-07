<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateSuperUser extends Command
{
    protected $signature = 'make:superuser';
    protected $description = 'Cria um super usuário para o sistema';

    public function handle()
    {
        $name = $this->ask('Nome do super usuário');
        $email = $this->ask('Email do super usuário');
        $password = $this->secret('Senha do super usuário');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'super_user', // Define o papel como admin
        ]);

        $this->info("Super usuário {$user->name} criado com sucesso!");
    }
}