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

    private $storage;
    private $sidebarArticleList;

    public function __construct()
    {
        $this->storage = Storage::disk(config('admin.upload.disk'));
        $this->sidebarArticleList = $this->sidebarArticleList();
    }

    public function index()
    {
        $rotaryMaps = $this->rotaryMaps();
        $articleList = $this->articleList();
        $storage = $this->storage;
        $sidebarTags = $this->sidebarTags();
        return view('blog-new.index', compact('rotaryMaps', 'articleList', 'storage', 'sidebarTags'));
    }

    public function showPost($id, Request $request)
    {
        $post = Post::with('tags')->where('id', $id)->firstOrFail();

        $map = Post::getArticleMapAndContent($post->content_html);

        $post->content_html = $map['content'];

        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::query()->where('tag', $tag)->firstOrFail();
        }
        $storage = $this->storage;
        $sidebarArticleList = $this->sidebarArticleList;
        $sidebarTags = $this->sidebarTags();
        $articleMap = $map['map'];
        return view('blog-new.article', compact('post', 'tag', 'storage', 'sidebarTags', 'articleMap'));
    }

}
