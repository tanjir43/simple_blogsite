<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DesignationController extends Controller
{
    public function index(){
        $designations = Designation::orderBy('title', 'ASC')->get();
        return view('backend.admin.team.designation.index',compact('designations'));
    }
    public function store(Request $request){
        $data = $request->all();

        $designationCount = Designation::where('title',$data['title'])->count();

        if($designationCount > 0){
            return redirect()->back()->with('error_message','Designation name already exist in our database');
        }

        $rules = [
            'title' => 'required|max:255'
        ];

        $customMessage = [
            'title.required' => 'Designation title is required'
        ];

        $this->validate($request , $rules ,$customMessage);
        $designation = new Designation();
        $designation->title = $data['title'];
        $designation->save();
        Session::flash('success_message','New Designation has been created successfully');
        return redirect()->back();
    }


    public function edit($id){
        $designation = Designation::find($id);
        return view('backend.admin.team.designation.edit',compact('designation'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $designation = Designation::findOrFail($id);

        $designationCount = Designation::where('id','!=', $designation->id)->where('title',$data['title'])->count();

        if($designationCount > 0){
            return redirect()->back()->with('error_message','Designation name already exist in our database');
        }

        $rules = [
            'title' => 'required|max:255'
        ];

        $customMessage = [
            'title.required' => 'Designation title is required'
        ];
        $this->validate($request, $rules, $customMessage);

        
        $designation->title = $data['title'];
        
        $designation->save();
       
        Session::flash('success_message','Designation has been updated Successfully');
        return redirect()->route('designation.index');
    }


    public function delete(Request $request, $id){
        Designation::deleteDesignation($id);
        Session::flash('success_message','Designation has been deleted successfully');
        return redirect()->back();
    }
}



