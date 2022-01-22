<?php

namespace App\Http\Controllers;


use App\Models\City;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Post;
use App\Models\Rubric;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request){

        /*Cookies*/

        //Cookie::queue('test', 'Test value', 10);
        //Cookie::queue(Cookie::forget('test'));
        //dump($request->cookie('my_application_session'));

        /*Записать данные в сессию*/
        //        $request->session()->put('test', 'testValue');
//        session()->put(['card' =>[
//            ['id' => '1', 'title' => 'Product 1'],
//            ['id' => '2', 'title' => 'Product 2'],
//        ]]);
//        /*Отобразить, получить данные из сессию*/
//        dump($request->session()->get('card')[1]['title']);
//        dump(session('card')[1]['title']);

        /*Дополнить данные в сессии */
        //$request->session()->push('card', ['id' => 3, 'title' => 'Product 3']);

        /*Удаление данные в сессии */
        //Прочитать и стереть
        //dump($request->session()->pull('testDelete'));

        //Стереть запись
        //$request->session()->forget('testDelete');

        //Очистить сессию
        //$request->session()->flash();

        /*Вывод*/
        //dump($request->session()->all());
        //dump(session()->all());

        /*Записать в кеш*/
        //Cache::put('key', 'value', 60);
        //Cache::put('key', 'value');
        //Cache::forever('key', 'value');

        /*Получить из кеша*/
        //dump(Cache::get('key'));


        /*Записать и удалить кеш*/

        //Cache::put('key', 'value', 60);

        /*Cache::pull('key');
        dump(Cache::get('key'));*/

        //Cache::forget('key');

        //Cache::flush();

        //dump(Cache::get('key'));

        //$posts = Post::orderBy('id', 'desc')->get();

/*        if (Cache::has('posts')) {
            $posts = Cache::get('posts');
        } else {
            $posts = Post::orderBy('id', 'desc')->get();
            Cache::put('posts', $posts);
        }*/



        /*Pagination*/
        $posts = Post::orderBy('id', 'desc')->paginate(3);

        $h1 = 'Home page';
        $title = 'Home';

        return view('index.home', compact('h1','posts', 'title'));
    }

    public function create(){
        $title = 'Create post';
        $rubrics = Rubric::pluck('title', 'id')->all();
        return view('create', compact('rubrics', 'title'));
    }

    public function store(Request $request){

        /*Построчное присваивание и сохранение*/

        /*$post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->rubric_id = $request->rubric_id;
        $post->save();*/

        /*Массовое присваивания и сохранение*/

        /*        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);*/

        $rules = [
            'title' => 'required|min:5|max:255|',
            'content' => 'required',
            'rubric_id' => 'integer',
        ];

        $this->validate($request, $rules);

        /*        $messages = [
            'title.required' => 'Заполните поле названия',
            'title.min' => 'В поле названия минимальное количество 5 символов',
            'title.max' => 'В поле названия максимальное количество 100 символов',
            'content.required' => 'Заполните поле с текстом',
            'rubric_id.integer' => 'Выберите рубрику для поста'
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

*/

        Post::create($request->all());

        $request->session()->flash('success', 'Created post');
        return redirect()->route('home');

    }

    public function dbRequest(){
        /*$data = DB::table('country')->get();
        $data = DB::table('country')->limit(5)->get();
        $data = DB::table('country')->limit(5)->select('Code', 'Name')->get();
        $data = DB::table('country')->limit(5)->select('Code', 'Name')->first();
        $data = DB::table('country')->limit(5)->select('Code', 'Name')->orderBy('Code', 'desc')->first();

        $data = DB::table('city')->select('ID', 'Name')->find(2);
        $data = DB::table('city')->select('ID', 'Name')->where('id', 2)->get();*/
        /*$data = DB::table('city')->select('ID', 'Name')->where([
            ['id', '>', '1'],
            ['id', '<', '5'],
        ])->get();*/

        /*        $data = DB::table('country')->max('Population');
        $data = DB::table('country')->max('Population');
        $data = DB::table('country')->count();
        $data = DB::table('country')->sum('Population');
        $data = DB::table('country')->avg('Population'); - среднее*/

        /*
        $data = DB::table('city')->distinct()->get();

        dd($data);*/

        // Methods - all, get, limit,find,

        /*        $post = new Post();
                $post->title = 'Title 1';
                //$post->content = 'Lorem ipsum 1 ';
                $post->save();

                $data = Country::all();
                $data = Country::limit(5)->get();
                $data = Country::query()->limit(5)->get();
                $data = Country::limit(5)->get();
                $data = Country::where('Code', '<', 'Albania')->get();
                $city= City::find(3);
                $country = Country::find('AND');*/

        /*        $post = new Post();
                $post->title = 'Статья 4';
                $post->content = 'Post content ';
                $post->save();*/

        /*        Post::query()->create([
                    'title' => 'Post 5',
                    'content' => 'Lorem ipsum 5'
                ]);*/

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
        /*  Post::where('id', '>', 3)->update(['updated_at' => NOW()]);*/
        /*Удаление записей*/

        /*        $post = Post::find(7);
                $post->delete();
                Post::destroy(7);
                Post::destroy([5,6]);*/

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
        /*$comment = Comment::find(2);
        dump($comment->post->title);*/

        /*        $posts = Post::where('id', '>', 1)->get();
                foreach($posts as $post){
                    dump($post->title, $post->comment);
                }*/

        // Ленивая, жадная загрузка - with('name')->
        /*        $comments = Comment::with('post')->where('id', '>', '0')->get();
                foreach ($comments as $comment){
                    dump($comment->title, $comment->post->title);
                }*/

        //belongsToMany
        /*        $post = Post::find(2);
                dump($post->title);
                foreach($post->tags as $tag){
                    dump($tag->title);
                }*/

        /*        $tag = Tag::find(4);
                dump($tag->title);
                foreach ($tag->posts as $post){
                    dump($post->title);
                }*/
    }
}
