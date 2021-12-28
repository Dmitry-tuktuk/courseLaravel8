<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){


        //$data = DB::table('country')->get();
        //$data = DB::table('country')->limit(5)->get();
        //$data = DB::table('country')->limit(5)->select('Code', 'Name')->get();
        //$data = DB::table('country')->limit(5)->select('Code', 'Name')->first();
        //$data = DB::table('country')->limit(5)->select('Code', 'Name')->orderBy('Code', 'desc')->first();

        //$data = DB::table('city')->select('ID', 'Name')->find(2);
        //$data = DB::table('city')->select('ID', 'Name')->where('id', 2)->get();
        /*$data = DB::table('city')->select('ID', 'Name')->where([
            ['id', '>', '1'],
            ['id', '<', '5'],
        ])->get();*/

        //$data = DB::table('country')->max('Population');
        //$data = DB::table('country')->max('Population');
        //$data = DB::table('country')->count();
        //$data = DB::table('country')->sum('Population');
        //$data = DB::table('country')->avg('Population'); - среднее


        $data = DB::table('city')->distinct()->get();

        dd($data);


        return view('index.home', ['titles' => $titles]);
    }
}
