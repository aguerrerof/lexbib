<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $totalTags = Tag::all()->count();
        $totalPosts = Post::all()->count();
        $totalCurrentUsers = User::all()->count();
        $postsCreatedToday = Post::select()
            ->limit(5)
            ->get();

        return view(
            'home',
            [
                'totalTags' => $totalTags,
                'totalPosts' => $totalPosts,
                'totalCurrentUsers' => $totalCurrentUsers,
                'postsCreatedToday' => $postsCreatedToday,
            ]);
    }
}
