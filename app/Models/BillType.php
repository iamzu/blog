<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class BillType extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'bill_type';


    public function setIncomeMoneyAttribute($money): void
    {
        $this->attributes['income_money'] = $money * 100;
    }

    public function getIncomeMoneyAttribute()
    {
        return $this->attributes['income_money'] / 100;
    }

    public function setExpenditureMoneyAttribute($money): void
    {
        $this->attributes['expenditure_money'] = $money * 100;
    }

    public function getExpenditureMoneyAttribute()
    {
        return $this->attributes['expenditure_money'] / 100;
    }
}
