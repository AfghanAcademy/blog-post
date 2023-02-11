<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index(){
        $posts = Post::where('id',3)->update(['title'=>'demo','sub_title'=>'demo','description'=>'demo','slug'=>'demo']);

        return $posts;
    }
}
