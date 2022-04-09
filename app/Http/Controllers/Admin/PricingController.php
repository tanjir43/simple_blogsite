<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class PricingController extends Controller
{
    
    public function index(){
        $packages = Package::all();
        return view('backend.admin.package.index',compact('packages'));
    }

    
    public function pricingAdd(){
        return view('backend.admin.package.add');
    }

   
    public function store(Request $request){
        $data = $request->all();

        $rules = [
            'title' => 'required|max:255',
            'features' => 'required',
            'image' => 'required',
            'price' => 'required',
        ];
        $customMessages = [
            'title.required' => 'Package Title is required',
            'title.max' => 'You are not allowed to enter more than 255 Characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $package = new Package();
        $package->title = $data['title'];
        $package->price = $data['price'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random .'.'. $extension;
                $image_path =public_path('uploads/'.$filename);
                Image::make($image_tmp)->save($image_path);
                $package->image = $filename;
            }
        }

        $features[] = $request->features;
        $featuresAll = json_encode($features);
        $package->features = $featuresAll;
        $package->save();
        Session::flash('success_message', 'Package has been Added Successfully');
        return redirect()->route('pricing.index');
    }

    
    public function edit($id){
        $package = Package::findOrFail($id);
        return view('backend.admin.package.edit', compact('package'));
    }


    // Store
    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'title' => 'required|max:255',
            'features' => 'required',
            'price' => 'required',
        ];
        $customMessages = [
            'title.required' => 'package Title is required',
            'title.max' => 'You are not allowed to enter more than 255 Characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $package = Package::findOrFail($id);
        $package->title = $data['title'];
        $package->price = $data['price'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random .'.'. $extension;
                $image_path =public_path('uploads/'.$filename);
                Image::make($image_tmp)->save($image_path);
                $package->image = $filename;
            }
        }

        $features[] = $request->features;
        $featuresAll = json_encode($features);
        $package->features = $featuresAll;
        $package->save();
        Session::flash('success_message', 'package has been Updated Successfully');
        return redirect()->route('pricing.index');
    }

    public function delete($id){
        Package::deletePackage($id);  
        Session::flash('success_message', 'package has been Deleted Successfully');
        return redirect()->route('pricing.index');
    }
}
