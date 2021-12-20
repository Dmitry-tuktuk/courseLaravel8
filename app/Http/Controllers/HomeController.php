<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index(){
        $name = 'Ivan';
        $lastName = 'Petrov';
        return view('home', compact('name', 'lastName'));
    }
    public function test(){
        return 'actionTest';
    }
}
