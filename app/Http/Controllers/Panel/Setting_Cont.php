<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting;

class Setting_Cont extends Controller
{
    public function showSetting()
    {
        return view('panel.setting.index')->with('settings',setting::get(['name','value','second_value'])->groupBy('name'));
    }
    public function saveSetting(Request $req)
    {
        $setting_info = $req->validate([
            'cafeName'=>'required|string|max:30'
        ]);
        setting::where('name','cafeName')->update(['value'=>$setting_info['cafeName']]);
        return redirect()->route('setting_show')->withSuccess(__('panel.settingSaved'));
    }
}
