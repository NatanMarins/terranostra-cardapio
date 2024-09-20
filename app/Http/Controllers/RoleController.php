<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index() {

        $roles = Role::orderBy('name');

        return view('role.index', compact('roles'));
    }
}
