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
        if (
            $request->has('q')
            && ! is_null($request->get('q')
            )) {
            $posts = Post::search(
                $request->get('q')
            );
            $podcasts = Podcast::search(
                $request->get('q')
            );
            if (
                $posts->count() < 1
                && $podcasts->count() < 1
            ) {
                return view('not_found');
            }
        }
        if (
            $request->has('tag')
            && ! is_null($request->get('tag')
            )) {
            $posts = Post::searchByTag(
                $request->get('tag')
            );
            $podcasts = Podcast::searchByTag(
                $request->get('tag')
            );
        }
        if (is_null($posts)) {
            $posts = Post::getLast(
                10
            );
            $podcasts = Podcast::getLast(
                10
            );
        }
        $tags = Tag::getLast(10);

        return view('landing', [
            'posts' => $posts,
            'podcasts' => $podcasts,
            'tags' => $tags,
            'q' => $request->get('q')
        ]);
    }

}
