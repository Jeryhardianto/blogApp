<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function dologin(Request $request)
    {
    //   ddd($this->userService->login($request));
        //validate input
        $validate = $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
     
        if(Auth::attempt($validate))
        {
            $request->session()->regenerate();
            if(Auth::user()->level == 'admin')
            {
                return redirect('/dashboard');
            }
            else
            {
                return "User biasa";
            }
        }
       return back()->with('loginError', 'Username or password is wrong!');


    }

    public function logout(Request $request){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }




} 
