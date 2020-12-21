<?php


namespace App\Admin\Repositories;

use App\Models\Post as Model;
use App\Models\Tag;
use Dcat\Admin\Form;
use Dcat\Admin\Repositories\EloquentRepository;
class Post extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    public static function tagOptions()
    {
        return Tag::all()->pluck('tag','id')->toArray();
    }
}
