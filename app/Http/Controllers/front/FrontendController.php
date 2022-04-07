<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

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
}
