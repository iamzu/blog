<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Blog\CommonActions;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use CommonActions;
    private $storage;

    public function __construct()
    {
        $this->storage = Storage::disk(config('admin.upload.disk'));
    }
    public function index($page = 1)
    {
        // 每页显示5条记录
        $posts = $this->articleList($page,5);
        $items = [];
        foreach ($posts->items() as $post) {
            $item['id'] = $post->id;
            $item['title'] = $post->title;
            $item['summary'] = $post->subtitle;
            $item['thumb'] = $this->storage->url($post->page_image);
            $item['posted_at'] = $post->ui_created_at;
            $item['views'] = random_int(1, 10000); // 暂时没有实现文章浏览数逻辑，返回随机数
            $items[] = $item;
        }
        $data = [
            'message' => 'success',
            'data' => [
                'articles' => $items,
                'lastPage' => $posts->lastPage()
            ]
        ];
        return response()->json($data);
    }

    public function detail($id)
    {
        $post = Post::query()->findOrFail($id);
        return new PostResource($post);
    }
}
