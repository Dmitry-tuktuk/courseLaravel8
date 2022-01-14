<?php

namespace App\Http\Controllers;

use App\Mail\testMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(){

        $title = 'Send mail';

        Mail::to('dev.kaminskyi@gmail.com')->send(new testMail());

        return view('send', compact('title'));
    }
}
