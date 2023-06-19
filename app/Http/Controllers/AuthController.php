<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        // dd($request->all());

        //validate data
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //login user
        $credentials = $request->only('email', 'password');
        if(\Auth::attempt($credentials)){
            return redirect('/');
        }
        return redirect('login')->withErrors(['error' => 'Invalid email or password.']);

    }

    public function register_view(){
        return view('auth.register');
    }

    public function register(Request $request){
        // dd($request->all());

        //validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        //save in users table
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password)
        ]);

        //login user here, once register done
        if(\Auth::attempt($request->only('email', 'password'))){
            return redirect('/');
        }
        return redirect('register')->withErrors('Error');

    }

    public function home(){
        return view('index');
    }

    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect()->route('login');
    }
}

