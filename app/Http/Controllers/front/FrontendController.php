<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Team;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about(){
        $about = AboutUs::first();
        $teams = Team::orderBy('id','ASC')->get();
        return view('front.pages.about',compact(['about','teams']));
    }
}
