<?php

namespace App\Policies;

use App\Models\Menu;
use App\Models\User;

class MenuPolicy
{

    public function viewAny(User $user){

        return in_array($user->role, ['superadmin', 'admin', 'user']);
    }


    public function view(User $user, Menu $menu){

        return in_array($user->role, ['superadmin', 'admin', 'user']);
    }


    public function create(User $user){

        return in_array($user->role, ['superadmin', 'admin']);
    }


    public function update(User $user, Menu $menu){

        return in_array($user->role, ['superadmin', 'admin']);
    }


    public function delete(User $user, Menu $menu){

        return $user->role === 'superadmin' || ($user->role === 'admin' && $user->empresa_id === $menu->empresa_id);
    }
}
