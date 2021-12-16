<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function (){
    $a = 2+3;
    $string = 'Test';
    return view('home', compact('a', 'string'));
})->name('home');

Route::get('/about', function (){
   return view('about');
});

/*Route::get('/contact', function (){
    return view('contact');
});

Route::post('/send-form', function (){
    return view('send-form');
});*/

/*Route::match(['post', 'get'], '/contact', function (){
   return view('contact');
});*/
/*Route::any('/contact', function (){
    return view('contact');
});*/
Route::match(['post', 'get', 'put'], '/contact', function (){
   return view('contact');
})->name('contact');

/*Route::redirect('/about', '/contact', 302);
Route::permanentRedirect('/about', '/contact');*/

/*Route::get('/post/{id}/{slug}', function ($id, $slug){
    return "Post $id | $slug";
})->where(['id' =>'[0-9]+', 'slug'=>'[A-Za-z0-9-]+']);*/

Route::get('/post/{id}/{slug?}', function ($id, $slug = null){
    return "Post $id | $slug";
})->name('post');

Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/posts', function(){
        return 'Posts List';
    });

    Route::get('/post/create', function(){
        return 'Posts List create';
    });

    Route::get('/post/{id}/edit', function($id){
        return "Post $id -  edit";
    })->name('post');
});

Route::fallback(function (){
    //return redirect()->route('home');
    abort(404,'Oopsss! Page not found..........');
});
