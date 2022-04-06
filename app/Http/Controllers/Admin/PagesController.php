<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{
    public function index(){
        $about_us = AboutUs::orderBy('id','desc')->get();
        return view('backend.admin.about_us.index', compact('about_us'));
    }

    public function aboutAdd(){
        return view('backend.admin.about_us.add');
    }

    public function store(Request $request){
        $data = $request->all();
       

        $about_us = new AboutUs();
        $about_us->page_name = $data['page_name'];
        $about_us->page_title = $data['page_title'];
        $about_us->page_subtitle = $data['page_subtitle'];
        $about_us->page_content = $data['page_content'];
   

     
        $random = Str::random(10);
        if($request->hasFile('image_1')){
            $image_tmp = $request->file('image_1');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/about/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $about_us->image_1 = $filename;
            }
        }
        $random = Str::random(10);
        if($request->hasFile('image_2')){
            $image_tmp = $request->file('image_2');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/about/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $about_us->image_2 = $filename;
            }
        }

        $random = Str::random(10);
        if($request->hasFile('image_3')){
            $image_tmp = $request->file('image_3');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/about/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $about_us->image_3 = $filename;
            }
        }
        $random = Str::random(10);
        if($request->hasFile('image_4')){
            $image_tmp = $request->file('image_4');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/about/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $about_us->image_4 = $filename;
            }
        }
        $about_us->save();
        Session::flash('success_message','About has been added Successfully');
        return redirect()->back();
    }

    public function edit($id){
        $about_us = AboutUs::find($id);
        return view('backend.admin.about_us.edit',compact('about_us'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
    

        $about_us = AboutUs::findOrFail($id);

        $about_us->page_name = $data['page_name'];
        $about_us->page_title = $data['page_title'];
        $about_us->page_subtitle = $data['page_subtitle'];
        $about_us->page_content = $data['page_content'];
   

     
        $random = Str::random(10);
        if($request->hasFile('image_1')){
            $image_tmp = $request->file('image_1');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/about/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $about_us->image_1 = $filename;
            }
        }
        $random = Str::random(10);
        if($request->hasFile('image_2')){
            $image_tmp = $request->file('image_2');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/about/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $about_us->image_2 = $filename;
            }
        }

        $random = Str::random(10);
        if($request->hasFile('image_3')){
            $image_tmp = $request->file('image_3');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/about/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $about_us->image_3 = $filename;
            }
        }
        $random = Str::random(10);
        if($request->hasFile('image_4')){
            $image_tmp = $request->file('image_4');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/about/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $about_us->image_4 = $filename;
            }
        }
        $about_us->save();
        $image_path = public_path('uploads/about/');
        if(!empty($data['image_1'])){
            if(file_exists($image_path.$about_us->image_1)){
                unlink($image_path.$data['current_image1']);
            }   
        }
        else  if(!empty($data['image_2'])){
            if(file_exists($image_path.$about_us->image_2)){
                unlink($image_path.$data['current_image2']);
            }   
        }
    
        else  if(!empty($data['image_4'])){
            if(file_exists($image_path.$about_us->image_4)){
                unlink($image_path.$data['current_image4']);
            }   
        }
        Session::flash('success_message','About has been updated Successfully');
        return redirect()->route('about.index');
    }

 


    public function delete(Request $request, $id){
        AboutUs::deleteAbout($id);
        Session::flash('success_message','About has been deleted successfully');
        return redirect()->back();
    }
}
