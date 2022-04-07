<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::latest()->get();
        return view('backend.admin.cms.blog.index',compact('blogs'));
    }

    public function blogadd(){
        $categories = Category::orderBy('category_name','ASC')->get();
        return view('backend.admin.cms.blog.add',compact(['categories']));
    }

    public function store(Request $request){
        $data = $request->all();

        $current_user = Auth::guard('admin')->user()->id;

        $rules = [
            'blog_title'    => 'required|max:255',
            'blog_content'  => 'required',
            'image'         => 'required',
            'category_id'   => 'required',

        ];
        $customMessage =[
            'blog_title.required' => 'Blog title is required',
            'blog_content.required' => 'Blog content os required',
            'blog_title.max'        => 'You are not allowed more than 255 characters',
            'image.required'        => 'Blog image is required',
            'category.required'     => 'PLease select a category'
        ];
        $this->validate($request ,$rules , $customMessage);
        $blog  = new Blog();
        $blog->blog_title   = $data['blog_title'];
        $blog->slug         = Str::slug($data['blog_title']);
        $blog->category_id  = $data['category_id'];
        $blog->blog_content = $data['blog_content'];

        if(!empty($data['status'])){
            $blog->status = 'published';
        }else{
            $blog->status = 'draft';
        }
        $blog->admin_id = $current_user;

        $random = Str::random(10);
        if ($request->hasFile('image')) {
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path =public_path('uploads/'. $filename);
                Image::make($image_tmp)->save($image_path);
                $blog->image = $filename;
            }
        }
        $blog->save();
        Session::flash('success_message','Blog has been added successfully');
        return redirect()->back();
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        $categories = Category::orderby('category_name','ASC')->get();
        return view('backend.admin.cms.blog.edit',compact(['categories','blog']));
    }

    public function update(Request $request , $id){
        $data = $request->all();

        $current_user = Auth::guard('admin')->user()->id;

        $rules = [
            'blog_title' => 'required|max:255',
            'blog_content' => 'required',
            'category_id' => 'required',
        ];
        $customMessages = [
            'blog_title.required' => 'Blog Title is required',
            'blog_content.required' => 'Blog Content is required',
            'blog_title.max' => 'You are not allowed to enter more than 255 Characters',
            'category_id' => 'Please Select an Category'
        ];
        $this->validate($request, $rules, $customMessages);
        $blog = Blog::findOrFail($id);

        $blog->blog_title = $data['blog_title'];
        $blog->slug = Str::slug($data['blog_title']);
        $blog->category_id = $data['category_id'];
        $blog->blog_content = $data['blog_content'];

        if (!empty($data['status'])) {
            $blog->status = 'published';
        } else {
            $blog->status = 'draft';
        }
        $blog->admin_id = $current_user;

        $random = Str::random(10);
        if ($request->hasFile('image')) {
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = public_path('uploads/'. $filename);
                Image::make($image_tmp)->save($image_path);
                $blog->image = $filename;
            }
        }
        $blog->save();
        Session::flash('success_message', 'Blog has been Updated Successfully');
        return redirect()->route('blog.index');
    }

    public function delete($id){
        Blog::deleteBlog($id);
        Session::flash('success_message','Blog has been deleted successfully');
        return redirect()->back();
    }

}
