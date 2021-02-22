<?php


namespace App\Http\Controllers\Blog;


use App\Models\Link;
use App\Models\Post;
use App\Models\Rotation;
use App\Models\Tag;
use Carbon\Carbon;

trait CommonActions
{
    /**
     * Author: chia2-y
     * Email: admin@chia2.com
     */
    public function rotaryMaps()
    {
        return Rotation::query()->where('status', Rotation::ENABLE)->get();
    }

    /**
     * Author: chia2-y
     * Email: admin@chia2.com
     * @param $page int
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function articleList($page = 1): \Illuminate\Contracts\Pagination\Paginator
    {
        return Post::query()->with('tags')
//            ->where('published_at', '<=', Carbon::now())
            ->where('is_draft', 0)
//            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(config('blog.posts_per_page'), '*', 'page', $page);
    }

    /**
     * Author: chia2-y
     * Email: admin@chia2.com
     * @param $ids array
     * @param $page int
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function tagArticleList($ids, $page = 1): \Illuminate\Contracts\Pagination\Paginator
    {
        return Post::query()->with('tags')
            ->where('is_draft', 0)
            ->whereIn('id', $ids)
            ->orderBy('created_at', 'desc')
            ->paginate(config('blog.posts_per_page'), '*', 'page', $page);
    }

    /**
     * Author: chia2-y
     * Email: admin@chia2.com
     */
    public function sidebarArticleList(): array
    {
        return Post::query()
            ->where([
                ['published_at', '<=', Carbon::now()],
                ['is_draft', 0]
            ])
            ->orderBy('published_at', 'desc')
            ->limit(5)->get()->toArray();
    }

    /**
     * Author: chia2-y
     * Email: admin@chia2.com
     */
    public function sidebarTags(): array
    {
        return Tag::query()
            ->orderBy('id', 'desc')->get()->toArray();
    }

    /**
     * Author: chia2-y
     * Email: admin@chia2.com
     */
    public function sidebarLinks(): array
    {
        return Link::query()
            ->where('status', 1)
            ->orderBy('index', 'desc')->get()->toArray();
    }
}
