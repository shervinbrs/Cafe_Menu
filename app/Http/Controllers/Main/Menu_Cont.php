<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting;
use App\Models\menu;
use App\Models\category;
use App\Models\item;

class Menu_Cont extends Controller
{
    public function index()
    {
        return view('menu.index')->with(
            [
                'setting'=>setting::get(['name','value','second_value'])->groupBy('name'),
                'menus'=>menu::all(['id','name','icon']),
                'categories'=>category::all(['id','name','menu_id']),
                'items'=>item::all(['id','name','category_id','price','desc','img'])
            ]);
    }
}
