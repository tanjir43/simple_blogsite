<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function setting(){
        $setting = SiteSetting::first();
        return view('backend.admin.settings.setting',compact('setting'));
    }

    public function settingUpdate(Request $request, $id){
        $data = $request->all();
        $setting = SiteSetting::first();
        $setting->email = $data['email'];
        $setting->phone = $data['phone'];
        $setting->address     = $data['address'];
        $setting->alt_phone   = $data['alt_phone'];
        $setting->office_hour = $data['office_hour'];
        $setting->save();
        Session::flash('success_message','Setting has been updated successfuly');
        return redirect()->back();

    }
    
}
