<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){

        $title = 'Registration';

        return view('users.create', compact('title'));
    }

    public function store(Request $request){

        //$this->validate($request, $rules);
        $request->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users,email',
           'password' => 'required|confirmed'
        ]);

        $user = User::create([
            //'name' => $request->input('name'),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        session()->flash('success', 'Вы успешно зарегистрировались');

        Auth::login($user);

        return redirect()->home();

    }

    public function loginForm(){

        $title = 'Login';

        return view('users.login', compact('title'));

    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email'=> $request->email,
            'password' => $request->password
        ])) {
            return redirect()->home();
        } else {
            return redirect()->back()->with('loginErrors', 'Incorrect login or password');
        }

    }

    public function logout(){

        Auth::logout();
        return redirect()->route('login.create');

    }

}
