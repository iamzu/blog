<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Tag extends Model
{
    use HasFactory,HasDateTimeFormatter;

    protected $fillable = [
        'tag', 'title', 'subtitle', 'page_image', 'meta_description', 'reverse_direction'
    ];

    public function posts()
    {
        $this->belongsToMany(Post::class, 'post_tag_pivot', 'tag_id', 'post_id');
    }

    public static function addNeededTags(array $tags)
    {
        if (count($tags) === 0) {
            return;
        }

        $found = static::query()->whereIn('tag', $tags)->pluck('tag')->all();

        foreach (array_diff($tags, $found) as $tag) {
            static::query()->create([
                'tag'               => $tag,
                'title'             => $tag,
                'subtitle'          => 'Subtitle for ' . $tag,
                'page_image'        => '',
                'meta_description'  => '',
                'reverse_direction' => false,
            ]);
        }
    }

    /**
     * Return the index layout to use for a tag
     *
     * @param string $tag
     * @param string $default
     * @return string
     */
    public static function layout($tag, $default = 'blog.layouts.index')
    {
        $layout = static::query()->where('tag', $tag)->get()->pluck('layout')->first();

        return $layout ?: $default;
    }
}
