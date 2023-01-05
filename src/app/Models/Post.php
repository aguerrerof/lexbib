<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'title',
        'user_id',
        'description',
        'deleted_at',
        'link',
    ];

    public static function search(string $q)
    {
        $query = self::query()
            ->where('posts.title', 'like', "%{$q}%")
            ->orWhere('posts.description', 'like', "%{$q}%");
        return $query->get();
    }

    public static function searchByTag(string $tagName)
    {
        $query = self::with('tags')->whereHas('tags', function (Builder $query) use ($tagName) {
            $query->where('title', '=', $tagName);
        });
        return $query->get();
    }

    public static function getLast(int $total)
    {
        return self::query()
            ->orderBy('id')
            ->limit($total)
            ->get();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Tag', 'posts_tags', 'post_id', 'tag_id');
    }

    public function getVimeoUrl(): string
    {
        $id = $this->getVideoId();
        return config('vimeo.VIMEO_PLAYER_URL') . '/' . $id;
    }

    /**
     * @return mixed|string
     * Obtained from https://gist.github.com/anjan011/1fcecdc236594e6d700f
     */
    private function getVideoId()
    {
        $regs = [];

        $id = '';

        if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im',
            $this->link, $regs)) {
            $id = $regs[3];
        }

        return $id;
    }
}
