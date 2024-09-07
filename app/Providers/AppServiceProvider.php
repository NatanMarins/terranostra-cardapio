<?php

namespace App\Providers;

use App\Models\Menu;
use App\Policies\MenuPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Menu::class => MenuPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        // Gate global para superadmin
        Gate::before(function ($user, $ability) {
            if ($user->role === 'superadmin') {
                return true;
            }
        });
    }
}