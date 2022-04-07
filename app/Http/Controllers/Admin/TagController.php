<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class TagController extends Controller
{
    public function index(){
        $tags = Tag::orderBy('tag_name','ASC')->get();
        return view('backend.admin.cms.tag.index',compact('tags'));
    }

    public function store(Request $request){
        $data = $request->all();

        $rules = [
            'tag_name' => 'required|max:255|unique:tags,tag_name',
        ];
        $customMessage = [
            'tag_name.required' => 'Tag name is required',
            'tag_name.unique'   => 'Tag name already exists in our database'
        ];  
        $this->validate($request , $rules , $customMessage);

        $tag = new Tag();
        $tag->tag_name = $data['tag_name'];
        $tag->slug     = Str::slug($data['tag_name']);
        $tag->save();
        Session::flash('success_message','Tag has been saved successfully');
        return redirect()->back();
    }

    public function update(Request $request ,$id){
        
        $data = $request->all();
        $tag = Tag::findOrFail($id);
        $rules = [
            'tag_name' => 'required|max:255|unique:tags,tag_name,'.$tag->id,
        ];
        $customMessages = [
            'tag_name.required' => 'tag Name is required',
            'tag_name.unique' => 'tag Name already exists in our database',
        ];
        $this->validate($request, $rules, $customMessages);
        $tag->tag_name = $data['tag_name'];
        $tag->slug = Str::slug($data['tag_name']);
        $tag->save();
        Session::flash('success_message', 'Tag has been Updated Successfully');
        return redirect()->back();



    }

    public function delete($id){
        Tag::deleteTag($id);
        Session::flash('success_message','Tag has been deleted successfully');
        return redirect()->back();
    }
}
