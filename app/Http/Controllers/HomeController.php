<?php

namespace App\Http\Controllers;


use App\Models\City;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Post;
use App\Models\Rubric;
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

        /*
        $data = DB::table('city')->distinct()->get();

        dd($data);*/

        // Methods - all, get, limit,find,

//        $post = new Post();
//        $post->title = 'Title 1';
//        //$post->content = 'Lorem ipsum 1 ';
//        $post->save();

//        $data = Country::all();
//        $data = Country::limit(5)->get();
//        $data = Country::query()->limit(5)->get();
//        $data = Country::limit(5)->get();
//        $data = Country::where('Code', '<', 'Albania')->get();
//        $city= City::find(3);
//        $country = Country::find('AND');

/*        $post = new Post();
        $post->title = 'Статья 4';
        $post->content = 'Post content ';
        $post->save();*/

//        Post::query()->create([
//            'title' => 'Post 5',
//            'content' => 'Lorem ipsum 5'
//        ]);

/*        $post = new Post();
        //Создать запрос
        $post->fill([
            'title' => 'Post 7',
            'content' => 'Lorem ipsum 7'
        ]);
        //Обязательно сохранить для отрабатывание запроса
        $post->save();*/


        /*Поиск и изменение записей*/
/*        $post = Post::find(6);
        $post->content = 'lorem ipsum 6...';
        $post->save();*/

        /*Массовое Обновление записей*/
//        Post::where('id', '>', 3)->update(['updated_at' => NOW()]);

        /*Удаление записей*/

//        $post = Post::find(7);
//        $post->delete();
//        Post::destroy(7);
//        Post::destroy([5,6]);

        /*$post = Post::find(1);
        $postTitle = $post->title;
        $rubricName = $post->rubric->title;
        dd($post, $postTitle, $rubricName);*/

        /*$rubric = Rubric::find(2);
        $postInRubric = $rubric->post->title;
        dd($rubric, $postInRubric);*/

        /*$post = Post::find(1);
        foreach($post->comments as $comment){
            dump($comment->title);
        };*/

/*        $post = Post::find(1);
        dump($post->comments);*/
        $comment = Comment::find(2);
        dd($comment->post->title);







        return view('index.home');
    }
}
