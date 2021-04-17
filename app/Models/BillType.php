<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class BillType extends Model
{
	use HasDateTimeFormatter,ModelTree;
    protected $table = 'bill_type';

    // 父级ID字段名称，默认值为 parent_id
    protected $parentColumn = 'pid';

    // 排序字段名称，默认值为 order
    protected $orderColumn = 'order';

    // 标题字段名称，默认值为 title
    protected $titleColumn = 'tag';


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
