<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Post;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index(){
        return view('backend.about.index')
                    ->with('about',About::first());
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'sub_title'=>'required',
            'description'=>'required',
        ]);

        About::where('id',1)->update(['title'=>$request->title,'sub_title'=>$request->sub_title,'description'=>$request->description]);

        Session::flash('success','About Updated Successfully');

        return redirect()->back();
    }
}
