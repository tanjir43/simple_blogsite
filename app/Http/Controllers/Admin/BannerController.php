<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function index(){
        $banners = Banner::orderBy('id','desc')->get();
        return view('backend.admin.banner.index', compact('banners'));
    }

    public function bannerAdd(){
        return view('backend.admin.banner.add');
    }

    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'title'  => 'required:max:255',
            'banner_content' => 'required',
            'image' => 'required',
            'link_title' => 'required',
            'link_url'  => 'required'
        ];

        $customMessage = [
            'title'     => 'Banner title is required',  
            'banner_content.required' => 'Banner content is required',
            'image.required'        => 'Banner image is required',
            'link_title.required'   => 'Banner link is required',
            'link_url.required'     => 'Banner link is required',
            'title.max'             => 'You are not allowed to enter more than 255 characters'
        ];
        $this->validate($request, $rules, $customMessage);

        $banner = new Banner();
        $banner->title = $data['title'];
        $banner->banner_content = $data['banner_content'];
        $banner->priority = $data['priority'];
        $banner->link_title = $data['link_title'];
        $banner->link_url = $data['link_url'];

        if(!empty($data['status'])){
            $banner->status = 'active';
        }else{
            $banner->status = 'inactive';
        }

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $banner->image = $filename;
            }
        }
        $banner->save();
        Session::flash('success_message','Banner has been added Successfully');
        return redirect()->back();
    }

    public function edit($id){
        $banner = Banner::find($id);
        return view('backend.admin.banner.edit',compact('banner'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'title'  => 'required:max:255',
            'banner_content' => 'required',
            'link_title' => 'required',
            'link_url'  => 'required'
        ];

        $customMessage = [
            'title'     => 'Banner title is required',  
            'banner_content.required' => 'Banner content is required',
            'link_title.required'   => 'Banner link is required',
            'link_url.required'     => 'Banner link is required',
            'title.max'             => 'You are not allowed to enter more than 255 characters'
        ];
        $this->validate($request, $rules, $customMessage);

        $banner = Banner::findOrFail($id);
        $banner->title = $data['title'];
        $banner->banner_content = $data['banner_content'];
        $banner->priority = $data['priority'];
        $banner->link_title = $data['link_title'];
        $banner->link_url = $data['link_url'];

        if(!empty($data['status'])){
            $banner->status = 'active';
        }else{
            $banner->status = 'inactive';
        }

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $banner->image = $filename;
            }
        }
        $banner->save();
        $image_path = public_path('uploads/');
        if(!empty($data['image'])){
            if(file_exists($image_path.$banner->image)){
                unlink($image_path.$data['current_image']);
            }
        }
        Session::flash('success_message','Banner has been updated Successfully');
        return redirect()->route('banner.index');
    }

    // public function delete($id){
    //     $banner = Banner::findOrFail($id);
    //     $banner->delete();
    //     $image_path = public_path('uploads/');
    //     if(file_exists($image_path.$banner->image)){
    //         unlink($image_path.$banner->image);
    //     }
    //     Session::flash('success_message', 'Banner has been deleted successfully');
    //     return redirect()->route('banner.index');
    // }


    public function delete(Request $request, $id){
        Banner::deleteBanner($id);
        Session::flash('success_message','Banner has been deleted successfully');
        return redirect()->back();
    }
}
