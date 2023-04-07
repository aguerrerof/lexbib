<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Podcast extends Model
{
    use HasSEO;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'podcasts';
    protected $fillable = [
        'uuid',
        'title',
        'user_id',
        'description',
        'deleted_at',
        'link',
        'link_podcast'
    ];

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public static function updateInformation(
        int $id,
        string $title,
        string $description,
        string $link,
        ?string $linkVideo,
        array $tags
    ): void {
        $podcast = Podcast::withTrashed()->findOrFail($id);
        $podcast->update([
            'title' => $title,
            'description' => $description,
            'link' => $linkVideo,
            'link_podcast' => $link,
            'deleted_at' => null
        ]);
        $podcast->seo->update([
            'title' => $title,
            'description' => $description,
        ]);
        PodcastTag::updateTagsByPodcast(
            $podcast,
            $tags
        );
    }

    public static function search(string $q, int $totalPage)
    {
        $query = self::query()
            ->where('podcasts.title', 'like', "%{$q}%")
            ->orWhere('podcasts.description', 'like', "%{$q}%");
        return $query->paginate($totalPage);
    }

    public static function searchByTag(string $tagName, int $totalPage)
    {
        $query = self::with('tags')->whereHas('tags', function (Builder $query) use ($tagName) {
            $query->where('title', '=', $tagName);
        });
        return $query->paginate($totalPage);
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
        return $this->belongsToMany('App\Models\Tag', 'podcasts_tags', 'podcast_id', 'tag_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function getVimeoUrl(): ?string
    {
        if (is_null($this->link)) {
            return null;
        }
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
