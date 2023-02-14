<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact.index');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required'
        ]);

        $data = [
            'name'=> $request->name,
            'email' => $request->email,
            'phone'=> $request->phone,
            'message' => $request->message
        ];


        Mail::to('afghanacademy2@gmail.com')->send(new ContactMail($data));
        
        return redirect()->back();
    }
}
