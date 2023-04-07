<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Podcast;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param string $uuid
     *
     * @return Application|Factory|View|Response
     */
    public function show(string $uuid)
    {
        $author = Author::with(['user','user.podcasts','user.posts'])->where(['uuid' => $uuid])->firstOrFail();

        $posts = Post::where(['user_id'=>$author->user->id])->paginate(3);
        $podcasts = Podcast::where(['user_id'=>$author->user->id])->paginate(3);
        return view('landing.author', [
            'author' => $author,
            'podcasts' => $podcasts,
            'posts' =>$posts,
        ]);
    }
}
