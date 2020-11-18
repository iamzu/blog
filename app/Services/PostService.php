<?php


namespace App\Services;


use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;

class PostService
{
    protected $tag;

    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return array
     */
    public function list(): array
    {
        if ($this->tag) {
           return $this->tagIndexData($this->tag);
        }
        return $this->normalIndexData();
    }

    /**
     * @return array
     */
    protected function normalIndexData()
    {
        $posts = Post::query()->with('tags')
            ->where('published_at', '<=', Carbon::now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->simplePaginate(config('blog.posts_per_page'));
        return [
            'title'             => config('blog.title'),
            'subtitle'          => config('blog.subtitle'),
            'posts'             => $posts,
            'page_image'        => config('blog.page_image'),
            'meta_description'  => config('blog.description'),
            'reverse_direction' => false,
            'tag'               => null,
        ];
    }

    protected function tagIndexData($tag)
    {
        $tag = Tag::query()->where('tag', $tag)->firstOrFail();
        $reverse_direction = (bool)$tag->reverse_direction;

        $posts = Post::query()->where('published_at', '<=', Carbon::now())
            ->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            })
            ->where('is_draft', 0)
            ->orderBy('published_at', $reverse_direction ? 'asc' : 'desc')
            ->simplePaginate(config('blog.posts_per_page'));
        $posts->appends('tag', $this->tag);

        $page_image = $tag->page_image ?: config('blog.page_image');

        return [
            'title'             => $tag->title,
            'subtitle'          => $tag->subtitle,
            'posts'             => $posts,
            'page_image'        => $page_image,
            'tag'               => $tag,
            'reverse_direction' => $reverse_direction,
            'meta_description'  => $tag->meta_description ?: config('blog.description'),
        ];
    }
}
