<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {

        //$createUser = DB::insert("INSERT INTO users (name, email, password) VALUES(?,?,?)", ['moder', 'moder@gmail.com', '']);
        //$createPost = DB::insert('INSERT INTO posts (title, description) VALUES(?,?)', ['Статья 6', 'Контент статьи 6']);
        //$updatePost = DB::update('UPDATE posts SET title = ? WHERE id = ?', ['Статья 4', 5]);
        //$deletePost = DB::delete('DELETE FROM posts WHERE id = ?', [7]);

        DB::beginTransaction();
        try {
            DB::update("UPDATE posts SET created_at = ? WHERE created_at IS NULL",[NOW()]);
            DB::update("UPDATE posts SET updated_at = ? WHERE updated_at IS NULL",[NOW()]);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
        }

        $users = DB::select("SELECT * FROM users");

        //$users = DB::table('users')->get();
        return view('users.index', compact('users'));
    }
}
