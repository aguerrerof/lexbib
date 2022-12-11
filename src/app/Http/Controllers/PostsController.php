<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\PostTag;
use Cassandra\Uuid;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $posts = Post::where(['user_id' => Auth::id()])
            ->withTrashed()
            ->get();
        return view('posts.list', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('posts.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = Post::create([
            'uuid'=>Str::uuid(),
            'title' => $request->getTitle(),
            'description' => $request->getDescription(),
            'link' => $request->getLink(),
            'user_id' => Auth::id()
        ]);
        PostTag::assignTagsByPost(
            $post,
            $request->getTags()
        );

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Application|Factory|View|Response
     */
    public function edit(int $id)
    {
        $post = Post::withTrashed()->with(['tags'])->findOrFail($id);
        return view('posts.edit', ['post' => $post,'tags'=>$post->tags()->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param UpdatePostRequest $request
     *
     * @return RedirectResponse
     */
    public function update(int $id,UpdatePostRequest $request)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->update([
            'title' => $request->getTitle(),
            'description' => $request->getDescription(),
            'link' => $request->getLink(),
            'deleted_at'=>null
        ]);

        PostTag::updateTagsByPost(
            $post,
            $request->getTags()
        );

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $tag = Post::findOrFail($id);
        $tag->delete();
        return redirect()->route('posts.index');
    }
}
