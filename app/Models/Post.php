<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

//    protected $table = 'my_posts';
//    protected $primaryKey = 'id_posts';
//    public $incrementing = false;
//    protected $keyType;
//    public $timestamps = false;
    protected $attributes = [
      'content' => 'Lorem ipsum...'
    ];

    protected $fillable = [
        'title',
        'content'
        ];
    /*guarded - свойство которое запрещает записывать данные в колонку*/

    /* protected $fillable = [
            'title',
        ];
    */
}
