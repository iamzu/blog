<?php


namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTagPivot;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\SiteMap;

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

    public function index($page = 1)
    {
        $rotaryMaps = $this->rotaryMaps();
        $articleList = $this->articleList($page);
        if ($articleList->lastpage() < $page) {
            abort(404);
        }
        return $this->view('blog-new.index', compact('rotaryMaps', 'articleList'));
    }

    public function showPost($id, Request $request)
    {
        $post = Post::with('tags')->where('id', $id)->firstOrFail();

        $content = Post::getArticleMapAndContent($post->content_html);

        $post->content_html = $content;

        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::query()->where('tag', $tag)->firstOrFail();
        }
        $prevPost = Post::query()->find(Post::getPrevPostId($id));
        $nextPost = Post::query()->find(Post::getNextPostId($id));
        return $this->view('blog-new.article', compact('post', 'tag', 'prevPost', 'nextPost'));
    }

    private function view($layout, $data)
    {
        $sidebarTags = $this->sidebarTags;
        $sidebarLinks = $this->sidebarLinks;
        $storage = $this->storage;
        return view($layout, array_merge($data, compact('sidebarTags', 'sidebarLinks', 'storage')));
    }

    public function showTag($name, $page = 1)
    {
        $tag = Tag::query()->where('tag', $name)->firstOrFail();

        $tag = $tag->toArray();
        if (mb_strlen($tag['subtitle']) < 8) {
            $tag['showNum'] = true;
        } else {
            $tag['showNum'] = false;
        }
        //tag post
        $ids = PostTagPivot::query()->where('tag_id', $tag['id'])->pluck('post_id')->toArray();
        $articleList = $this->tagArticleList($ids, $page);
        if ($articleList->lastpage() < $page) {
            abort(404);
        }
        $tag['count'] = $articleList->total();
        return $this->view('blog-new.tag', compact('tag', 'articleList'));
    }

    public function siteMap(SiteMap $siteMap)
    {
        $map = $siteMap->getSiteMap();

        return response($map)
            ->header('Content-type', 'text/xml');
    }

}
