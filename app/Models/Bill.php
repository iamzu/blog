<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'bill';

    public function setMoneyAttribute($money)
    {
        $this->attributes['money'] = $money * 100;
    }

    public function getMoneyAttribute($money)
    {
        return $this->attributes['money'] / 100;
    }

    public function tags()
    {
        return $this->hasOne(BillType::class, 'id','tag_id');
    }
}
