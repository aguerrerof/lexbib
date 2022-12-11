<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Request;

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
     * @param string $term
     *
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $term = $request->query->get('term');
        $response  = Tag::query()
            ->where('title', 'LIKE', "%{$term}%")
            ->get();
        return response()->json([
            'total'=>$response->count(),
            'results'=>$response
        ]);
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
        $tag = Tag::findOrFail($id);
        return view('tags.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTagRequest $request
     * @param Tag $tag
     *
     * @return RedirectResponse
     */
    public function update(int $id, UpdateTagRequest $request)
    {
        $tag = Tag::findOrFail($id);
        $tag->update([
            'title' => $request->getTitle(),
            'meta_title' => $request->getMetaTitle(),
            'slug' => $request->getSlug() ?? '',
            'context' => $request->getContext(),
        ]);
        return redirect()->route('tags.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
