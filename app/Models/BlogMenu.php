<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogMenu extends Model
{
    use HasFactory, HasDateTimeFormatter, ModelTree;

    protected $fillable = ['parent_id', 'order', 'title', 'icon', 'uri', 'show'];
    protected $table = 'blog_menu';

    public $orderColumn = 'order';

    protected $titleColumn = 'title';

    protected $parentColumn = 'parent_id';
}
