<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogLastLogin
{
    public function handle(Login $event)
    {
        // Atualiza o campo last_login_at com a data e hora atuais
        $event->user->last_login_at = now();
        $event->user->save();
    }
}
