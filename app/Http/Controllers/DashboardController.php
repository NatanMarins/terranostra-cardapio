<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $menus = Menu::with('categoria')->get();

        return view('menu.index',compact('menus'));
    }
}
