<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Test\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

/*#Поддомен
Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

#Домен
Route::get('/', [HomeController::class, 'index']);
Route::get('/test', [HomeController::class, 'test']);
Route::get('/test2', [TestController::class, 'index']);
Route::get('/page/{slug}', [PageController::class, 'show']);

Route::resource('/admin/posts', PostController::class, ['parameters' => [
    'posts' => 'id',
]]);

Route::fallback(function (){
    #return redirect()->route('home');
    abort(404,'Oopsss! Page not found..........');
});

Route::get('/lara', function (){

});

Route::match(['get', 'post'], '/match', [DocController::class, 'index']);
Route::any('/match', [DocController::class, 'index']);

#Redirect
Route::redirect('/here', '/there', 301);

#Route view
Route::view('/welcome', '/welcome', ['name' => 'dev']);

#URI params
Route::get('/user/{id}', function ($id){
   return "User - $id";
});
#?params
Route::get('/params/{name?}', function ($name = null){
   return "User - $name";
});

#Regular Expression Constraints
Route::get('/user/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('/user/{id}/{name}', function ($id, $name) {
    //
})->whereNumber('id')->whereAlpha('name');

#Names routes
Route::get('/user/profile/{id}', [UserController::class, 'show'])->name('profile');

#Middleware
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/first', function () {
        // Использует посредники `first` и `second` ...
    });

    Route::get('/second', function () {
        // Использует посредники `first` и `second` ...
    });
});
#prefix
Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Соответствует URL-адресу `/admin/users` ...
    })->middleware('admin');
});*/

/*Route::get('/', function () {
    return response('Hello World', 200)
        ->header('Content-Type', 'text/plain');
});
Route::get('/test', function (){
    return view('components.alert');
});
Route::get('/users', [UsersController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/create', [HomeController::class, 'create'])->name('posts.create');
Route::post('/', [HomeController::class, 'store'])->name('posts.store');
Route::get('/page/about', [PageController::class, 'show'])->name('page.about');

/*send email*/
Route::match(['get', 'post'], '/send', [ContactController::class, 'send'])->name('send-message');

/*Reg*/
Route::get('/register', [UserController::class, 'create'])->name('register.create');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

/*Auth*/
Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
