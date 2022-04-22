<?php
namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index(){
        // dd('in index');

        return view('register');
    }
    public function add_user(Request $request){
        $this->validate($request,[
            'nom'=>'required|max:255',
            'prenom'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed'
        ]);
        User::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'email'=>$request->email,
            'password'=>hash::make( $request->password)
        ]);
        auth()->attempt($request->only('email','password'));
        return redirect('/demandes');

    }
}
