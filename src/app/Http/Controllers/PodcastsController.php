<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePodcastRequest;
use App\Http\Requests\UpdatePodcastRequest;
use App\Models\Podcast;
use App\Models\PodcastTag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PodcastsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Podcast::where(['user_id' => Auth::id()])
            ->withTrashed()
            ->get();
        return view('podcasts.list', [
            'podcasts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('podcasts.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePodcastRequest $request
     *
     * @return Response
     */
    public function store(StorePodcastRequest $request)
    {

        $podcast = Podcast::create([
            'uuid' => Str::uuid(),
            'title' => $request->getTitle(),
            'description' => $request->getDescription(),
            'link' => $request->getLinkVideo(),
            'link_podcast' => $request->getLinkPodcast(),
            'user_id' => Auth::id()
        ]);
        PodcastTag::assignTagsByPodcast(
            $podcast,
            $request->getTags()
        );

        return redirect()->route('podcasts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param string $uuid
     *
     * @return Response
     */
    public function show(string $uuid)
    {
        $podcast = Podcast::with(['tags'])->where(['uuid' => $uuid])->firstOrFail();
        return view('podcasts.show', [
            'podcast' => $podcast,
            'tags' => $podcast->tags()->get(),
            'link' => (!is_null($podcast->link) && !empty($podcast->link))? $podcast->getVimeoUrl() : null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(int $id)
    {
        $podcast = Podcast::withTrashed()->with(['tags'])->findOrFail($id);
        return view('podcasts.edit', ['podcast' => $podcast, 'tags' => $podcast->tags()->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param UpdatePodcastRequest $request
     *
     * @return Response
     */
    public function update(int $id, UpdatePodcastRequest $request)
    {
        $podcast = Podcast::withTrashed()->findOrFail($id);
        $podcast->update([
            'title' => $request->getTitle(),
            'description' => $request->getDescription(),
            'link' => $request->getLinkVideo(),
            'link_podcast' => $request->getLinkPodcast(),
            'deleted_at' => null
        ]);

        PodcastTag::updateTagsByPodcast(
            $podcast,
            $request->getTags()
        );

        return redirect()->route('podcasts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Podcast $podcast
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $podcast = Podcast::findOrFail($id);
        $podcast->delete();
        return redirect()->route('podcasts.index');
    }
}
