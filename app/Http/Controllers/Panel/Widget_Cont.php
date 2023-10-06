<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\widget;

class Widget_Cont extends Controller
{
    public function list()
    {
        return view('panel.widget.list')->with('widgets',widget::paginate(20));
    }
    public function showEdit(widget $widget)
    {
        return view('panel.widget.edit')->with('widget',$widget);
    }
    public function edit(widget $widget,Request $req)
    {
        $widget_info = $req->validate([
            'content'=>'nullable|string'
        ]);      
        if(isset($req->is_active))
        $widget_info['is_active'] = true;
        else $widget_info['is_active'] = false;
        $widget->update($widget_info);
        return redirect()->route('widget_edit',$widget->id)->withSuccess(__('panel.widgetEdited'));
    }
    public function toggle(widget $widget)
    {
        $widget->update(['is_active'=>$widget['is_active'] ^ 1]);
        return redirect()->route('widget_list')->withSuccess(__('panel.widgetStatus'));
    }
}
