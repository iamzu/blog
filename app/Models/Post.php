<?php

namespace App\Models;

use App\Services\Markdowner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'subtitle', 'content_raw', 'page_image', 'meta_description','layout', 'is_draft', 'published_at',
    ];

    protected $dates = ['published_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * User: ZY
     * Date: 2020/11/18 11:19
     */
    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag_pivot', 'post_id', 'tag_id');
    }

    /**
     * 设置标题属性并自动设置Slug
     *
     * @param string $value
     */
    public function setTitleAttribute($value): void
    {
        $this->attributes['title'] = $value;
        if (!$this->exists) {
            $value = uniqid(Str::random(8), true);
            $this->setUniqueSlug($value, 0);
        }
    }

    /**
     * 递归例程设置唯一的段
     *
     * @param string $title
     * @param mixed $extra
     */
    protected function setUniqueSlug($title, $extra): void
    {
        $slug = Str::slug($title . ' - ' . $extra);

        if (static::query()->where('slug', $slug)->exists()) {
            $this->setUniqueSlug($title, $extra + 1);
            return;
        }
        $this->attributes['slug'] = $slug;
    }

    /**
     * 设置原始内容后自动设置HTML内容
     *
     * @param string $value
     */
    public function setContentRawAttribute($value): void
    {
        $markdown = new Markdowner();
        $this->attributes['content_raw'] = $value;
        $this->attributes['content_html'] = $markdown->toHTML($value);
    }

    public function syncTags(array $tags)
    {
        Tag::addNeededTags($tags);
        if (count($tags)) {
            $this->tags()->sync(
                Tag::query()->whereIn('tag', $tags)->get()->pluck('id')->all()
            );
            return;
        }
        $this->tags()->detach();
    }

    /**
     * 返回 published_at 字段的日期部分
     */
    public function getPublishDateAttribute($value)
    {
        return $this->published_at->format('Y-m-d');
    }

    /**
     * 返回 published_at 字段的时间部分
     */
    public function getPublishTimeAttribute($value)
    {
        return $this->published_at->format('g:i A');
    }

    /**
     * content_raw 字段别名
     */
    public function getContentAttribute($value)
    {
        return $this->content_raw;
    }

}
