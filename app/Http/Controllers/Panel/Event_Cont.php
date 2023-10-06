<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\event;

class Event_Cont extends Controller
{
    public function list()
    {
        return view('panel.event.list')->with('events',event::paginate(20));
    }
    public function showCreate()
    {
        return view('panel.event.create');
    }
    public function showEdit(event $event)
    {
        return view('panel.event.edit')->with('event',$event);
    }
    public function create(Request $req)
    {
        $event_info = $req->validate([
            'name'=>'required|string|max:30',
            'desc'=>'required|string|max:150',
            'date'=>'required|date',
            'number'=>'required|min:1|max:24|different:number2',
            'number2'=>'required|min:1|max:24',
            'thumb'=>'required|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $file_name = uniqid().'.'.$req->file('thumb')->getClientOriginalExtension();
        Storage::putFileAs('public',$req->file('thumb'),$file_name);
        event::create([
            'name'=>$event_info['name'],
            'desc'=>$event_info['desc'],
            'date'=>$event_info['date'],
            'time'=>json_encode([$event_info['number'],$event_info['number2']]),
            'img'=>$file_name
        ]);
        return redirect()->route('event_create')->withSuccess(__('panel.eventCreated'));
    }
    public function edit(event $event,Request $req)
    {
        $event_info = $req->validate([
            'name'=>'required|string|max:30',
            'desc'=>'required|string|max:150',
            'date'=>'required|date',
            'number'=>'required|min:1|max:24|different:number2',
            'number2'=>'required|min:1|max:24',
            'thumb'=>'file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if(isset($req->thumb))
        {
            Storage::delete('public/'.$event->img);
            $file_name = uniqid().'.'.$req->file('thumb')->getClientOriginalExtension();
            Storage::putFileAs('public',$req->file('thumb'),$file_name);
        }
        $event->update([
            'name'=>$event_info['name'],
            'desc'=>$event_info['desc'],
            'date'=>$event_info['date'],
            'time'=>json_encode([$event_info['number'],$event_info['number2']]),
            'img'=>(isset($file_name) ? $file_name : $event->img)
        ]);
        return redirect()->route('event_edit',$event->id)->withSuccess(__('panel.eventEdited'));
    }
    public function delete(event $event)
    {
        Storage::delete('public/'.$event->img);
        $event->delete();
        return redirect()->route('event_list')->withSuccess(__('panel.eventDeleted'));
    }
}
