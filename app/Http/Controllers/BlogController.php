<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    //
    public function index()
    {
        dd(human_filesize(1024));
        $posts = Post::query()->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));
        return view('blog.index', compact('posts'));
    }

    public function showPost($slug)
    {
        $post = Post::query()->where('slug',$slug)->firstOrFail();
        return view('blog.post', compact('post'));
    }
}
