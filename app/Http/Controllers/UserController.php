<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index(){
        return 'index';
    }

    public function show($id){
        return $id;
    }
}
