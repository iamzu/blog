<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Dcat\Admin\Traits\Resizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rotation extends Model
{
    use HasFactory,HasDateTimeFormatter,Resizable;

    public const ENABLE = 1;
    public const DISABLE = 0;
    protected $table = 'rotation';
}
