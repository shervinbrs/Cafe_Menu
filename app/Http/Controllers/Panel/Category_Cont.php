<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\menu;

class Category_Cont extends Controller
{
    public function list()
    {
        return view('panel.category.list')->with('categories',category::paginate(20));
    }
    public function showCreate()
    {
        return view('panel.category.create')->with('menus',menu::all());
    }
    public function showEdit(category $category)
    {
        return view('panel.category.edit')->with(['menus'=>menu::all(),'category'=>$category]);
    }
    public function create(Request $req)
    {
        $category_info = $req->validate([
            'menu_id'=>'required|integer',
            'name'=>'required|string|max:30'
        ]);
        category::create($category_info);
        return redirect()->route('category_create')->withSuccess(__('panel.categoryCreated'));
    }
    public function edit(category $category,Request $req)
    {
        $category_info = $req->validate([
            'menu_id'=>'required|integer',
            'name'=>'required|string|max:30'
        ]);
        $category->update($category_info);
        return redirect()->route('category_edit',$category->id)->withSuccess(__('panel.categoryEdited'));
    }
    public function delete(category $category)
    {
        $category->delete();
        return redirect()->route('category_list')->withSuccess(__('panel.categoryDeleted'));
    }
}
