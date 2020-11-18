<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Tag extends Model
{
    use HasFactory;

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
}
