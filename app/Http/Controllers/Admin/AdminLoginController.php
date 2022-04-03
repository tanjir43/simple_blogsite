<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function adminLogin(){
        if(Auth::guard('admin')->check()){
            return redirect('/admin/dashboard');
        }else{
            return view('backend.admin.auth.login');
        }
    }

    public function adminDashboard(){
        return view('backend.admin.auth.dashboard');
    }

    public function loginAdmin(Request $request){
        $data = $request->all();
        $rules = [
            'email' => 'required|email|max:255',
            'password'  => 'required'
        ];
        $customMessage = [
            'email.required' => 'E-mail address is required',
            'email.email'    => 'Please enter a valid email address',
            'email.max'      => 'You are not allowed to enter more than 255 characters',
            'password.required' => 'Password is required'
        ];
        $this->validate($request, $rules, $customMessage);

        if (Auth::guard('admin')->attempt(['email'=> $data['email'], 'password' => $data['password']])){
            return redirect('/admin/dashboard');
        }
        else{
            Session::flash('error_message', 'Invalid Email or Password');
            return redirect()->back();
        }
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        Session::flash('logout_message','Successfully logout');
        return redirect('/admin/login');
    }
}
