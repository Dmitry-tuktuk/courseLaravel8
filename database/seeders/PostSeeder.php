<?php

namespace Database\Seeders;

use App\Models\Post;
use DB;
use Illuminate\Database\Seeder;
use Str;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create one post
        /*        DB::table('posts')->insert([
           'title' => Str::random(10),
           'content' => Str::random(10),
           'rubric_id' => '1',
           'created_at' => date("Y-m-d H:i:s"),
           'updated_at' => date("Y-m-d H:i:s"),
        ]);*/
    }
}
