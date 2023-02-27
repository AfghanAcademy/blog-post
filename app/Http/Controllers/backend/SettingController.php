<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function index(){
        return view('backend.setting.index')
                    ->with('setting',Setting::first());
    }

    public function store(Request $request){
        $request->validate([
            'logo'=>'required',
            'facebook'=>'nullable|url',
            'twitter'=>'nullable|url',
            'email'=>'nullable|email',
        ]);

        Setting::where('id','1')->update(['logo'=>$request->logo,'facebook'=>$request->facebook,'twitter'=>$request->twitter,'email'=>$request->email,'phone'=>$request->phone,'address'=>$request->address]);

        Session::flash('success','Setting Updated');
        return redirect()->back();
    }
}
