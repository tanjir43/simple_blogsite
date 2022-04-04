<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ThemeController extends Controller
{
    public function theme(){
        $theme = Theme::first();
        return view('backend.admin.theme.theme', compact('theme'));
    }

    public function themeUpdate(Request $request, $id){
        $data = $request->all();
        $rules = [
            'website_name'    => 'required|max:40',
            'website_tagline' => 'required',
            
    
        ];

        $customMessage = [
            'website_name.required' => 'Website name is required',
            'website_name.max'      => 'You are not allowed to enter more than 40 characters',
            'website_tagline.required' => 'Website tagline is required'
        ];
        $this->validate($request, $rules,$customMessage);

        $theme = Theme::findOrFail($id);
        $theme->website_name    = $data['website_name'];
        $theme->website_tagline  = $data['website_tagline'];
        $theme->logo  = $data['logo'];
        $theme->favicon  = $data['favicon'];

        $random = Str::random(10);
        if($request->hasFile('logo')){
            $image_tmp = $request->file('logo');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $theme->logo = $filename;
            }
        }

        $random = Str::random(10);
        if($request->hasFile('favicon')){
            $image_tmp = $request->file('favicon');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $theme->favicon = $filename;
            }
        }
        $theme->save();
        Session::flash('success_message', 'Theme settings has been Updated Successfully');
        return redirect()->back();
    }
}
