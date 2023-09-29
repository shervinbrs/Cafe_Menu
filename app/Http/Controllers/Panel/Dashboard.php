<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\category;
use App\Models\item;
use App\Models\User;

class Dashboard extends Controller
{
    //
    public function index()
    {
        return view('panel.dashboard')->with(
            [
                'menus'=>menu::count(),
                'categories'=>category::count(),
                'items'=>item::count(),
                'users'=>User::count()
            ]
        );
    }
}
