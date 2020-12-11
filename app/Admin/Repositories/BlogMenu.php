<?php

namespace App\Admin\Repositories;

use App\Models\BlogMenu as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class BlogMenu extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
