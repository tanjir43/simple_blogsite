<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Social;
use App\Models\Tag;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function about(){
        $about = AboutUs::first();
        $teams = Team::orderBy('id','ASC')->get();
        return view('front.pages.about',compact(['about','teams']));
    }

    public function testimonial(){
        $testimonials = Testimonial::latest()->get();
        return view('front.pages.testimonial',compact('testimonials'));
    }

    public function blog(){
        $blogs = Blog::where('status','published')->latest()->paginate(6);
        return view('front.pages.blog',compact('blogs'));
    }

    public function blogDetails($slug){
        $blogs = Blog::where('slug',$slug)->first();
        $blogkey = 'blog_'.$blogs->id;
        if(!Session::has($blogkey)){
            $blogs->increment('view_count');
            Session::put($blogkey,1);
        }
        $related_posts = Blog::where('id','!=', $blogs->id)->where('category_id', $blogs->category_id)->latest()->take(2)->get();
        $recent_articles = Blog::where('id', '!=' ,$blogs->id)->latest()->take(3)->get();
        $categories = Category::orderBy('category_name','ASC')->get();
        $tags   = Tag::orderBy('tag_name','ASC')->get();
        return view('front.pages.blog-details',compact(['tags','blogs','related_posts','recent_articles','categories']));
    }

    public function categoryBlog($slug){

        $categoryDetail = Category::where('slug', $slug)->first();
        $blogs = Blog::where('status','published')->where('category_id',$categoryDetail->id)->latest()->paginate(6);

        return view('front.pages.categoryblog',compact(['categoryDetail','blogs']));
    }
}
