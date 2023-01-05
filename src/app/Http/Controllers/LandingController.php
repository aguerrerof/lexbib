<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $posts = null;
        if ($request->has('tag')) {
            $posts = Post::searchByTag(
                $request->get('tag')
            );
        } elseif ($request->has('q')) {
            $posts = Post::search(
                $request->get('q')
            );
            if ($posts->count() < 1) {
                return view('not_found');
            }
        }
        if (is_null($posts)) {
            $posts = Post::getLast(
                10
            );
        }
        $tags = Tag::getLast(10);

        return view('landing', [
            'posts' => $posts,
            'tags' => $tags,
            'q' => $request->get('q')
        ]);
    }

}
