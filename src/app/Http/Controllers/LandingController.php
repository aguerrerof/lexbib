<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $posts = null;
        if ($request->has('q')) {
            $posts = Post::search(
                $request->get('q')
            );
        }else{
            $posts = Post::query()
                ->orderBy('id')
                ->limit(10)
                ->get();
        }
        if ($request->has('tag')) {
            $posts = Post::searchByTag(
                $request->get('tag')
            );
        }
        return view('landing', [
            'posts' => $posts
        ]);
    }
}
