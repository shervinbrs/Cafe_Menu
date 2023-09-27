<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class Menu_Cont extends Controller
{
    public function list()
    {
        return view('panel.menu.list')->with('menus',Menu::paginate());
    }
    public function showCreate()
    {
        return view('panel.menu.create');
    }
    public function showEdit(Menu $menu)
    {
        return view('panel.menu.edit')->with('menu',$menu);
    }
    public function create(Request $req)
    {
        $menu_info = $req->validate([
            'name'=>'required|string|max:30',
            'icon'=>'required|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $file_name = uniqid().'.'.$req->file('icon')->getClientOriginalExtension();
        Storage::putFileAs('public',$req->file('icon'),$file_name);
        $menu_info['icon'] = $file_name;
        Menu::create($menu_info);
        return redirect()->route('menu_create')->withSuccess(__('panel.menuCreated'));
    }
    public function edit(Menu $menu,Request $req)
    {
        $menu_info = $req->validate([
            'name'=>'required|string|max:30',
            'icon'=>'file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if(isset($req->icon))
        {
            Storage::delete('public/'.$menu->icon);
            $file_name = uniqid().'.'.$req->file('icon')->getClientOriginalExtension();
            Storage::putFileAs('public',$req->file('icon'),$file_name);
            $menu_info['icon'] = $file_name;
        }
        $menu->update($menu_info);
        return redirect()->route('menu_edit',$menu->id)->withSuccess(__('panel.menuEdited'));
    }
    public function delete(Menu $menu)
    {
        Storage::delete('public/'.$menu->icon);
        $menu->delete();
        return redirect()->route('menu_list')->withSuccess(__('panel.menuDeleted'));
    }
}