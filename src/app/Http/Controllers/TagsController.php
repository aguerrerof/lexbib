<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.list', [
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('tags.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTagRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreTagRequest $request): RedirectResponse
    {
        Tag::create([
            'title' => $request->getTitle(),
            'meta_title' => $request->getMetaTitle(),
            'slug' => $request->getSlug() ?? '',
            'context' => $request->getContext(),
        ]);

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     *
     * @return Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     *
     * @return Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTagRequest $request
     * @param Tag $tag
     *
     * @return Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     *
     * @return Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
