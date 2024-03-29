<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('backend.post.index')
                    ->with('posts',Post::where('lang',app()->getLocale())->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create')
                    ->with('topics',Topic::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required|max:50',
            'sub_title'=>'required|max:50',
            'description'=>'required',
            'topic'=>'required|array'
        ]);
        
       $post = Post::create(['title'=>$request->title,'sub_title'=>$request->sub_title,'description'=>$request->description,'slug'=>Str::slug($request->title),'lang'=>app()->getLocale(),'profile_id'=>Auth::user()->profile->id]);

       $post->topics()->attach($request->topic);
        


        Session::flash('success','Create Successfully');
      
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('backend.post.edit')
                    ->with('post',$post)
                    ->with('topics',Topic::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        $request->validate([
            'title'=>'required|max:50',
            'sub_title'=>'required|max:50',
            'description'=>'required',
            'topic'=>'required|array'
        ]);

        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title);
        $post->save();

        $post->topics()->sync($request->topic);


        Session::flash('success','Update Successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return "success";
    }

    public function trash(){
       
        return view('backend.post.trash')
                    ->with('posts',Post::onlyTrashed()->paginate(10));
    }

    public function delete($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return "success";
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();

        return redirect()->route('post.index');
    }
}
