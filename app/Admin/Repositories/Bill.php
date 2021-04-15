<?php

namespace App\Admin\Repositories;

use App\Models\Bill as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Bill extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

}
