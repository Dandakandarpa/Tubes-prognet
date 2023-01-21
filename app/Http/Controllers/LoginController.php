<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        return view('login',[

            'title'=> 'Login'
        ]);
    }
    public function authenticate(Request $request){

        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/crud2')->with('message','Berhasil!');
        }
 
        return back()->with('loginError','login failed!');
        
    }

    public function logout(request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/login');
         
    }
}
