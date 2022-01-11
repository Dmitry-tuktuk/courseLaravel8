<?php

namespace App\Models;

use Carbon\Carbon;
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

    // belongsTo - один к одному связь
    public function rubric(){
        return $this->belongsTo(Rubric::class);
    }
    // hasMany - один ко многим получить коментарии к посту
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function tags() {
        //belongsToMany - многие ко многим
        return $this->belongsToMany(Tag::class);
    }

    public function getPostDate(){
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
