<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class AdminProfileController extends Controller
{
    public function adminProfile(){
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('backend.admin.profile.profile',compact('adminDetails'));
    }

    public function adminProfileUpdate(Request  $request, $id){
        $data = $request->all();

        $rules = [
            'name'    => 'required',
            'email'   => 'required|email|max:255',
            'phone'   => 'numeric'    
        ];

        $customMessage = [
            'name.required' => 'Name is required',
            'email.required'=> 'E-mail adress is reuquired',
            'email.email'   => 'Please enter a valid email address',
            'email.max'     => "You are not allowed to enter than 255 Character",
        ];
        $this->validate($request, $rules, $customMessage);
        $admin = Admin::findOrFail($id);
        $admin->name = $data['name'];
        $admin->email= $data['email'];
        $admin->phone= $data['phone'];
        $admin->address = $data['address'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'.$extension;
                $image_path = public_path('uploads/admin/' .$filename);
                Image::make($image_tmp)->save($image_path);
                $admin->image = $filename;
            }
        }
        $admin->save();
        Session::flash('success_message','Profile has been updated Successfully');
        return redirect()->back();
    }

    public function deleteImage($id){
        $image = Admin::findOrFail($id);
        $image = Admin::where('id',$id)->update(['image'=>'']);
        $image_path = public_path('uploads/admin/');
        if(!empty($image->image)){
            if(file_exists($image_path.$image->image)){
                unlink($image_path.$image->image);
            }
        }
        Session::flash('info_message', 'Image has been deleted successfully');
        return redirect()->back();
    }

    public function changePassword(){
        return view('backend.admin.profile.change_password');
    }

    public function chkUserPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_password'];
        $user_id = Auth::guard('admin')->user()->id;
        $check_password = Admin::where('id', $user_id)->first();
        if(Hash::check($current_password, $check_password->password)){
            return "true"; die;
        } else {
            return "false"; die;
        }
    }

}
