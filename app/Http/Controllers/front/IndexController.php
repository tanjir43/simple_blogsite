<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $banners = Banner::where('status','active')->orderBy('priority','DESC')->get();
        $bannersImage = Banner::where('status','active')->orderBy('priority','DESC')->first();
        $testimonials = Testimonial::latest()->get();
        return view('front.home.index',compact(['banners','bannersImage','testimonials']));
    }
}
