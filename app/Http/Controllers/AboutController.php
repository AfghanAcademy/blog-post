<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        
        return view('frontend.about.index')
                    ->with('about',About::first());
    }
}
