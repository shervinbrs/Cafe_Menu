<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\item;
use App\Models\category;

class Item_Cont extends Controller
{
    public function list()
    {
        return view('panel.item.list')->with('items',item::paginate(20));
    }
    public function showCreate()
    {
        return view('panel.item.create')->with('categories',category::all());
    }
    public function showEdit(item $item)
    {
        return view('panel.item.edit')->with(['Selecteditem'=>$item,'categories'=>category::all()]);
    }
    public function create(Request $req)
    {
        $item_info = $req->validate([
            'name'=>'required|string|max:40',
            'desc'=>'required|string|max:80',
            'price'=>'required|string|max:10',
            'category_id'=>'required|integer',
            'thumbnail'=>'required|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $file_name = uniqid().'.'.$req->file('thumbnail')->getClientOriginalExtension();
        Storage::putFileAs('public',$req->file('thumbnail'),$file_name);
        $item_info['img'] = $file_name;
        item::create($item_info);
        return redirect()->route('item_list')->withSuccess(__('panel.itemCreated'));
    }
    public function edit(item $item,Request $req)
    {
        $item_info = $req->validate([
            'name'=>'required|string|max:40',
            'desc'=>'required|string|max:80',
            'price'=>'required|string|max:10',
            'category_id'=>'required|integer',
            'thumbnail'=>'file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if(isset($req->thumbnail))
        {
            Storage::delete('public/'.$item->img);
            $file_name = uniqid().'.'.$req->file('thumbnail')->getClientOriginalExtension();
            Storage::putFileAs('public',$req->file('thumbnail'),$file_name);
            $item_info['img'] = $file_name; 
        }
        $item->update($item_info);
        return redirect()->route('item_edit',$item->id)->withSuccess(__('panel.itemEdited'));
    }
    public function delete(item $item)
    {
        Storage::delete('public/'.$item->img);
        $item->delete();
        return redirect()->route('item_list')->withSuccess(__('panel.itemDeleted'));
    }
}
