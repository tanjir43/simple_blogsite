<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SocialController extends Controller
{
    public function social(){
        $social = Social::first();
        return view('backend.admin.social.social',compact('social'));
    }

    public function socialUpdate(Request $request, $id){
        $data   = $request->all();
        $social = Social::first();
        $social->facebook = $data['facebook'];
        $social->youtube = $data['youtube'];
        $social->instagram = $data['instagram'];
        $social->linkedin = $data['linkedin'];
        $social->twitter = $data['twitter'];
        $social->save();
        Session::flash('success_message','Social links  has been updated successfully');
        return redirect()->back();

    }
}
