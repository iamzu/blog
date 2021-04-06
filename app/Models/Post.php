<?php

namespace App\Models;

use App\Services\Markdowner;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory, HasDateTimeFormatter;

    protected $fillable = [
        'title', 'subtitle', 'content_raw', 'page_image', 'meta_description', 'layout', 'is_draft', 'published_at',
    ];

    protected $dates = ['published_at'];

    protected $appends = [
        'ui_created_at'
    ];

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

    public function url(Tag $tag = null)
    {
        $url = url('blog/' . $this->slug);
        if ($tag) {
            $url .= '?tag=' . urlencode($tag->tag);
        }

        return $url;
    }

    public function tagLinks($base = '/blog?tag=%TAG%')
    {
        $tags = $this->tags()->get()->pluck('tag')->all();
        $return = [];
        foreach ($tags as $tag) {
            $url = str_replace('%TAG%', urlencode($tag), $base);
            $return[] = '<a href="' . $url . '">' . e($tag) . '</a>';
        }
        return $return;
    }

    public function newerPost(Tag $tag = null)
    {
        $query = static::query()->where('published_at', '>', $this->published_at)
            ->where('published_at', '<=', Carbon::now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'asc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }

        return $query->first();
    }

    public function olderPost(Tag $tag = null)
    {
        $query =
            static::query()->where('published_at', '<', $this->published_at)
                ->where('is_draft', 0)
                ->orderBy('published_at', 'desc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }

        return $query->first();
    }

    public static function tagOptions()
    {
        return Tag::all()->pluck('tag', 'id')->toArray();
    }

    public static function getArticleMapAndContent($html): array
    {

        $doc = new \DOMDocument();
        $doc->loadHTML('<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>' . $html);

        $xPath = new \DOMXPath($doc);
        $idItems = $xPath->query('//h1|//h2|//h3|//h4|//h5|//h6');
        $idMap = [];
        $mapHTML = '';
        foreach ($idItems as $item) {
            if (get_class($item) !== 'DOMElement') {
                continue;
            }
            if (!in_array($item->nodeName, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'])) {
                continue;
            }
            $id = $item->getAttribute('id');

            if (strpos($id, 'toc') === 0 && !isset($idMap[$id])) {
                $idMap[$id] = true;
                continue;
            }
            $newId = 'toc-' . count($idMap);
            $item->setAttribute('id', $newId);
            $idMap[$newId] = true;

            $mapHTML .= <<<HTML
<li class="page-nav-item h1">
    <a href="#{$newId}" class="limit-text block">
         <strong>{$item->nodeValue}</strong>
    </a>
</li>
HTML;
        }
        return [
            'content' => $doc->saveHTML(),
            'map' => $mapHTML,
        ];
    }

    public function getUiCreatedAtAttribute()
    {
        return date('Y-m-d', strtotime($this->created_at));
    }

    public static function getPrevPostId($id, $tag = null)
    {
        $model = self::query()->where([
            ['id', '<', $id],
            ['is_draft', 0]
        ]);
        if (empty($tag)) {
            $model->with(['tags' => function ($q) use ($tag) {
                $q->where('tag_id', $tag);
            }]);
        }
        return $model->max('id');
    }

    public static function getNextPostId($id, $tag = null)
    {
        $model = self::query()->where([
            ['id', '>', $id],
            ['is_draft', 0]
        ]);
        if (empty($tag)) {
            $model->with(['tags' => function ($q) use ($tag) {
                $q->where('tag_id', $tag);
            }]);
        }
        return $model->min('id');
    }
}
