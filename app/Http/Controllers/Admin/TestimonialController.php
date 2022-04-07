<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::latest()->get();
        return view('backend.admin.testimonial.index', compact('testimonials'));
    }

    public function testimonialAdd(){
        return view('backend.admin.testimonial.add');
    }

    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'position' => 'required',
            'image' => 'required',
            'details' => 'required'
        ];
        $customMessage = [
            'name.required' => 'Name is required',
        ];

        $this->validate($request, $rules, $customMessage);

        $testimonial = new Testimonial();
        $testimonial->name = $data['name'];
        $testimonial->position = $data['position'];
        $testimonial->details = $data['details'];
        

    

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $testimonial->image = $filename;
            }
        }
        $testimonial->save();
        Session::flash('success_message','Testimonial has been added Successfully');
        return redirect()->back();
    }

    public function edit($id){
        $testimonial = Testimonial::find($id);
        return view('backend.admin.testimonial.edit',compact('testimonial'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'position' => 'required',
            'image' => 'required',
            'details' => 'required'
        ];
        $customMessage = [
            'name.required' => 'Name is required',
        ];

        $this->validate($request, $rules, $customMessage);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $data['name'];
        $testimonial->position = $data['position'];
        $testimonial->details = $data['details'];
    

    

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $testimonial->image = $filename;
            }
        }
        $testimonial->save();
        Session::flash('success_message','Testimonial has been added Successfully');
        return redirect()->back();
    }

   
    public function delete(Request $request, $id){
        Testimonial::deleteTestimonial($id);
        Session::flash('success_message','Testimonial has been deleted successfully');
        return redirect()->back();
    }
}
