<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class User_Cont extends Controller
{
    public function list()
    {
        return view('panel.user.list')->with('users',User::paginate(20));
    }
    public function showCreate()
    {
        return view('panel.user.create');
    }
    public function showEdit(User $user)
    {
        return view('panel.user.edit')->with('user',$user);
    }
    public function create(Request $req)
    {
        $user_info = $req->validate(
            [ 
                'name'=>'required|string|max:30',
                'username'=>'required|string|max:11|unique:users',
                'email'=>'required|string|unique:users',
                'password'=>'required|string',
                'type'=>'required|integer|max:1'
            ]);
            $user_info['password'] = Hash::make($user_info['password']);
            User::create($user_info);
            return redirect()->route('user_list')->withSuccess(__('panel.userCreated'));
    }
    public function edit(User $user,Request $req)
    {
        $user_info = $req->validate(
            [ 
                'name'=>'required|string|max:30',
                'username'=>'required|string|max:11|unique:users,username,'.$user->id,
                'email'=>'required|string|unique:users,email,'.$user->id,
                'password'=>'required|string',
                'type'=>'integer|max:1'
            ]);
        if(isset($req->password))
        {
            $user_info['password'] = Hash::make($req->password);
        }
        $user->update($user_info);
        return redirect()->route('user_edit',$user->id)->withSuccess(__('panel.userEdited'));
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('user_list')->withSuccess(__('panel.userDeleted'));
    }
}
