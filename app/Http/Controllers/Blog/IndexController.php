<?php


namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTagPivot;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    use CommonActions;

    private $storage;
    private $sidebarTags;
    private $sidebarLinks;

    public function __construct()
    {
        $this->storage = Storage::disk(config('admin.upload.disk'));
        $this->sidebarTags = $this->sidebarTags();
        $this->sidebarLinks = $this->sidebarLinks();
    }

    public function index()
    {
        $rotaryMaps = $this->rotaryMaps();
        $articleList = $this->articleList();
        return $this->view('blog-new.index', compact('rotaryMaps', 'articleList'));
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
        $articleMap = $map['map'];
        return $this->view('blog-new.article', compact('post', 'tag', 'articleMap'));
    }

    private function view($layout, $data)
    {
        $sidebarTags = $this->sidebarTags;
        $sidebarLinks = $this->sidebarLinks;
        $storage = $this->storage;
        return view($layout, array_merge($data, compact('sidebarTags', 'sidebarLinks', 'storage')));
    }

    public function showTag($name)
    {
        $tag = Tag::query()->where('tag', $name)->first();
        if ($tag) {
            $tag = $tag->toArray();
            if (mb_strlen($tag['subtitle']) < 8) {
                $tag['showNum'] = true;
            } else {
                $tag['showNum'] = false;
            }
        } else {
            abort(404);
        }
        //tag post
        $ids = PostTagPivot::query()->where('tag_id', $tag['id'])->pluck('post_id')->toArray();
        $articleList = $this->tagArticleList($ids);
        $tag['count'] = $articleList->count();
        return $this->view('blog-new.tag', compact('tag', 'articleList'));
    }

}
