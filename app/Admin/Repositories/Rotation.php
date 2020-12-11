<?php

namespace App\Admin\Repositories;

use App\Models\Rotation as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Rotation extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

}
