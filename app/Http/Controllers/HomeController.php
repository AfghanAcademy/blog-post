<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home.index')
                    ->with('posts',Post::orderBy('created_at','DESC')->paginate(5));
    }


    public function show($slug){
        $post = Post::where('slug',$slug)->first();
        return view('frontend.home.show')
                    ->with('post',$post);
    }
}
