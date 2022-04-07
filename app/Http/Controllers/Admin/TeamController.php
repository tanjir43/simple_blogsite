<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class TeamController extends Controller
{
    public function index(){
        $teams = Team::orderBy('id','DESC')->get();
        return view('backend.admin.team.index',compact('teams'));
    }

    public function teamAdd(){
        $designations  = Designation::orderBy('title','ASC')->get();
        return view('backend.admin.team.add',compact('designations'));
    }

    public function store(Request $request){
        $data = $request->all();

        $rules = [
            'name'  => 'required|max:255',
            'image' => 'required',
            'designation_id' => 'required'
        ];

        $customMessage = [
            'title.required'  => 'Team name is required',
            'image.required'  => 'Image is required',
            'designation_id.required'  => 'Please select a designation',
            'title.max'     => 'You are not allow to enter more than 255 characters'
        ];

        $this->validate($request , $rules , $customMessage);
        $team = new Team();
        $team->name             = ucwords(strtolower($data['name']));
        $team->designation_id   = $data['designation_id'];
        $team->facebook         = $data['facebook'];
        $team->twitter          = $data['twitter'];
        $team->instagram        = $data['instagram'];
        $team->linkedin         = $data['linkedin'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename  = $random .'.'. $extension;
                $imge_path= public_path('uploads/'. $filename);
                Image::make($image_tmp)->save($imge_path);
                $team->image = $filename;
            }
        }
        $team->save();
        Session::flash('success_message','Team has been added successfully');
        return redirect()->back();
    }

    public function edit($id){
        $team = Team::where('id',$id)->first();
        $designations =Designation::orderBy('title','ASC')->get();
        return view('backend.admin.team.edit',compact(['team','designations']));
    }

   public function update(Request $request ,$id){
       $data = $request->all();

      
       $rules = [
        'name'  => 'required|max:255',
        'designation_id' => 'required'
    ];

    $customMessage = [
        'title.required'  => 'Team name is required',
        'designation_id.required'  => 'Please select a designation',
        'title.max'     => 'You are not allow to enter more than 255 characters'
    ];

    $this->validate($request ,$rules , $customMessage);
    $team = Team::where('id', $id)->first();
        $team->name = ucwords(strtolower($data['name']));
        $team->designation_id = $data['designation_id'];
        $team->facebook = $data['facebook'];
        $team->twitter = $data['twitter'];
        $team->linkedin = $data['linkedin'];
        $team->instagram = $data['instagram'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
            $extension = $image_tmp->getClientOriginalExtension();
            $filename  = $random .'.'. $extension ;
            $image_path = 'uploads/'. $filename ;
            Image::make($image_tmp)->save($image_path);
            $team->image = $filename;
        }
    }
    $team->save();
    Session::flash('success_message','Team has been updated successfully');
    return redirect()->route('team.index');
   }

   public function delete($id){
    Team::TeamDelete($id);
    Session::flash('success_message','Team has been deleted successfully');
    return redirect()->back();
   }
}
