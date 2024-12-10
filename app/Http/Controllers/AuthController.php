<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function index(){
        return view('login_form');
    }
    public function login_function(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        if(Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ])){
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error','Authentication Failed!!');
        }
    }
}
