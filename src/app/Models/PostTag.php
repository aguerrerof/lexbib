<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'posts_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'post_id',
        'tag_id',
    ];

    public static function assignTagsByPost(Post $post, array $tags): void
    {
        foreach ($tags as $tag) {
            self::create([
                'post_id' => $post->getAttribute('id'),
                'tag_id' => $tag
            ]);
        }
    }
}
