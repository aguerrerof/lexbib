<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PodcastTag extends Model
{
    use HasFactory;

    protected $table = 'podcasts_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'podcast_id',
        'tag_id',
    ];

    public static function assignTagsByPodcast(Podcast $podcast, array $tags): void
    {
        foreach ($tags as $tag) {
            self::create([
                'podcast_id' => $podcast->getAttribute('id'),
                'tag_id' => $tag
            ]);
        }
    }


    public static function updateTagsByPodcast(Podcast $podcast, array $tags): void
    {
        DB::table('podcasts_tags')->where('podcast_id', $podcast->getAttribute('id'))->delete();
        foreach ($tags as $tag) {
            self::create([
                'podcast_id' => $podcast->getAttribute('id'),
                'tag_id' => $tag
            ]);
        }
    }
}
