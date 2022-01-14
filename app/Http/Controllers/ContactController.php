<?php

namespace App\Http\Controllers;

use App\Mail\testMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request){

        $adminMail = "dev.kaminskyi@gmail.com";

        $title = 'Send mail';


        if ($request->method()  == 'POST'){
            $body = "<p><b>Имя:</b> {$request->input('name')}</p>";
            $body .= "<p><b>Email:</b> {$request->input('email')}</p>";
            $body .= "<p><b>Текст:</b><br>" . nl2br($request->input('text')) ."</p>";

            Mail::to($adminMail)->send(new testMail($body));

            $request->session()->flash('success', 'Сообщение отправлено');

            return redirect(route('send-message'));

        }

        return view('send', compact('title'));

    }
}
