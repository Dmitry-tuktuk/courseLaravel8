<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $rubric_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rubric[] $rubric
 * @property-read int|null $rubric_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRubricId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        'content',
        'rubric_id'
        ];
    /*guarded - свойство которое запрещает записывать данные в колонку*/

    /* protected $fillable = [
            'title',
        ];
    */

    // belongsTo - один к одному связь
    public function rubric(){
        return $this->hasMany(Rubric::class);
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
