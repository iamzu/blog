<?php

namespace App\Admin\Repositories;

use App\Models\BillType as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class BillType extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
