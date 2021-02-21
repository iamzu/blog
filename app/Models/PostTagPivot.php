<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTagPivot extends Model
{
    use HasFactory;
    protected $table = 'post_tag_pivot';
    public $timestamps = false;
}
