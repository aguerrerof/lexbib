<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Post extends Model
{
    use HasSEO;
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

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $link
     * @param array $tags
     *
     * @throws ModelNotFoundException
     * @return void
     */
    public static function updateInformation(
        int $id,
        string $title,
        string $description,
        string $link,
        array $tags
    ): void {
        $post = self::withTrashed()->findOrFail($id);
        $post->update([
            'title' => $title,
            'description' => $description,
            'link' => $link,
            'deleted_at' => null
        ]);
        $post->seo->update([
            'title' => $title,
            'description' => $description,
        ]);
        PostTag::updateTagsByPost(
            $post,
            $tags
        );
    }

    public static function search(string $q, int $totalPage): \Illuminate\Contracts\Pagination\Paginator
    {
        $query = self::query()
            ->where('posts.title', 'like', "%{$q}%")
            ->orWhere('posts.description', 'like', "%{$q}%");
        return $query->paginate($totalPage);
    }

    public static function searchByTag(string $tagName, int $totalPage): LengthAwarePaginator
    {
        $query = self::with('tags')->whereHas('tags', function (Builder $query) use ($tagName) {
            $query->where('title', '=', $tagName);
        });
        return $query->paginate($totalPage);
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
