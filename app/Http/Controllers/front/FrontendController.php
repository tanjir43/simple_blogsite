<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about(){
        $about = AboutUs::first();
        return view('front.pages.about',compact('about'));
    }
}
