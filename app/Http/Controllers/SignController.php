<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index(){
       
        return view('sign_in');
    }
    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
       if(!auth()->attempt($request->only('email','password'))) {
        return back()->with('status', 'Invalid login details');

    }else
    return redirect('/demandes');

    //    dd('ok') ;
    }
}
