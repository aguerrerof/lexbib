<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $posts = null;
        $podcasts = null;

        if (! is_null($request->get('q'))) {
            $posts = Post::search(
                $request->get('q'),
                5
            );
            $podcasts = Podcast::search(
                $request->get('q'),
                5
            );
            if (
                $posts->count() < 1
                && $podcasts->count() < 1
            ) {
                return view('not_found');
            }
        }
        if (! is_null($request->get('tag'))) {
            $posts = Post::searchByTag(
                $request->get('tag'),
                3
            );
            $podcasts = Podcast::searchByTag(
                $request->get('tag'),
                3
            );
        }
        if (is_null($posts) && is_null($podcasts)) {
            $posts = Post::latest()->paginate(3);
            $podcasts = Podcast::latest()->paginate(3);
        }
        $tags = Tag::getLast(10);

        return view('landing.index', [
            'posts' => $posts,
            'podcasts' => $podcasts,
            'tags' => $tags,
            'q' => $request->get('q')
        ]);
    }

}
