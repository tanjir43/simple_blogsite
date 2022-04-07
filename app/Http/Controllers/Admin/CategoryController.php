<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('backend.admin.cms.category.index',compact('categories'));
    }
    public function store(Request $request){
        $data = $request->all();

        $rules = [
            'category_name' => 'required|max:255|unique:categories,category_name',
        ];
        $customMessages = [
            'category_name.required' => 'Category Name is required',
            'category_name.unique' => 'Category Name already exists in our database',
        ];
        $this->validate($request, $rules, $customMessages);
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->slug = Str::slug($data['category_name']);
        $category->save();
        Session::flash('success_message', 'Category has been Added Successfully');
        return redirect()->back();

    }




    public function update(Request $request, $id){
        $data = $request->all();
        $category = Category::findOrFail($id);
        $rules = [
            'category_name' => 'required|max:255|unique:categories,category_name,'.$category->id,
        ];
        $customMessages = [
            'category_name.required' => 'Category Name is required',
            'category_name.unique' => 'Category Name already exists in our database',
        ];
        $this->validate($request, $rules, $customMessages);
        $category->category_name = $data['category_name'];
        $category->slug = Str::slug($data['category_name']);
        $category->save();
        Session::flash('success_message', 'Category has been Updated Successfully');
        return redirect()->back();
    
    }
    public function delete(Request $request, $id){
        Category::deleteCategory($id);
        Session::flash('success_message','Category has been deleted successfully');
        return redirect()->back();
    }
}
