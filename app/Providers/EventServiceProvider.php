<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * O mapeamento de eventos para os ouvintes do aplicativo.
     *
     * @var array
     */
    protected $listen = [
        Login::class => [
            'App\Listeners\LogLastLogin',
        ],
    ];

    /**
     * Registra quaisquer eventos para o aplicativo.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
