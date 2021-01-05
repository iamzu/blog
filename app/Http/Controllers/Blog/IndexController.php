<?php


namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    use CommonActions;

    public function index()
    {
        $rotaryMaps = $this->rotaryMaps();
        $articleList = $this->articleList();
        $storage = Storage::disk(config('admin.upload.disk'));
        return view('blog-new.index', compact('rotaryMaps', 'articleList','storage'));
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->where('slug', $slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::query()->where('tag', $tag)->firstOrFail();
        }
        $storage = Storage::disk(config('admin.upload.disk'));
        return view('blog-new.article', compact('post', 'tag','storage'));
    }
}
