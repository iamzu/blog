<?php

namespace App\Models;

use App\Services\Markdowner;
use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'about';

    protected $fillable = ['content_raw','content_html'];

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
}
