<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ProjectController extends Controller
{
    

    public function index(){
        $projects = Project::latest()->get();
        return view('backend.admin.project.index', compact('projects'));
    }

    
    public function projectAdd(){
        return view('backend.admin.project.add');
    }

    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'details' => 'required',
            'image' => 'required',
        ];
        $customMessages = [
            'name.required' => 'Project Name is required',
            'details.required' => 'Project Details is required',
            'image.required' => 'Project Image is required',
            'name.max' => 'You are not allowed to enter more than 255 Characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $project = new Project();
        $project->name = $data['name'];
        $project->slug = Str::slug($data['name']);
        $project->details = $data['details'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random .'.'. $extension;
                $image_path = public_path('uploads/'.$filename);
                Image::make($image_tmp)->save($image_path);
                $project->image = $filename;
            }
        }

        $project->save();
        Session::flash('success_message', 'Project has been Added Successfully');
        return redirect()->route('project.index');
    }

    public function edit($id){
        $project = Project::where('id', $id)->first();
        return view('backend.admin.project.edit', compact('project'));
    }


    // Update Project
    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'details' => 'required',
        ];
        $customMessages = [
            'name.required' => 'Project Name is required',
            'details.required' => 'Project Details is required',
            'name.max' => 'You are not allowed to enter more than 255 Characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $project = Project::where('id', $id)->first();
        $project->name = $data['name'];
        $project->slug = Str::slug($data['name']);
        $project->details = $data['details'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random .'.'. $extension;
                $image_path = public_path('uploads/'.$filename);
                Image::make($image_tmp)->save($image_path);
                $project->image = $filename;
            }
        }

        $project->save();
        Session::flash('success_message', 'Project has been Updated Successfully');
        return redirect()->route('project.index');
    }

    public function delete($id){
        Project::deleteProject($id);  
        Session::flash('success_message', 'Project has been Deleted Successfully');
        return redirect()->route('project.index');
    }

}
