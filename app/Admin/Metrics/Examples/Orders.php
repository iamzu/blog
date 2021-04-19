<?php

namespace App\Admin\Metrics\Examples;

use App\Models\Bill;
use App\Models\BillType;
use Carbon\Carbon;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Metrics\Donut;
use Illuminate\Http\Request;

class Orders extends Donut
{
    /**
     * 初始化卡片内容
     */
    protected function init()
    {
        parent::init();

        $this->title('TOP3');
        $this->dropdown([
            '0' => '本月',
            '30' => '上月',
        ]);
    }

    /**
     * 处理请求
     *
     * @param Request $request
     *
     * @return mixed|void
     */
    public function handle(Request $request)
    {
        $arr = $this->withContent($request->get('option'));
        $this->chartLabels($arr['labels']);
        $this->content($arr['html']);
        $this->withChart($arr['moneys']);
    }

    /**
     * 设置图表数据.
     *
     * @param array $data
     *
     * @return $this
     */
    public function withChart(array $data)
    {
        return $this->chart([
            'series' => $data,
        ]);
    }

    /**
     * 卡片内容.
     *
     * @param int $mode
     *
     */
    public function withContent($mode)
    {
        $tagIds = [];
        $data = [];
        $whereBetween = [
            Carbon::now()->startOfMonth()->format('Y-m-d H:i:s'),
            Carbon::now()->endOfMonth()->format('Y-m-d H:i:s'),
        ];

        switch ($mode) {
            case '0':
            default:
                $whereBetween = [
                    Carbon::now()->startOfMonth()->format('Y-m-d H:i:s'),
                    Carbon::now()->endOfMonth()->format('Y-m-d H:i:s'),
                ];

                break;
            case '30':
                $whereBetween = [
                    Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d H:i:s'),
                    Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d H:i:s'),
                ];
                break;
        }
        $data = Bill::query()
            ->whereBetween('created_at', $whereBetween)
            ->where([
                ['type',1],
                ['user_id',Admin::user()->id]
            ])
            ->groupBy('parent_tag_id')
            ->selectRaw('parent_tag_id as tag,sum(money) as money')
            ->orderBy('money','desc')
            ->limit(3)
            ->get()
            ->toArray();
        $data = arrayCombine($data, 'tag');
        $tagIds = array_keys($data);
        $tags = BillType::query()->whereIn('id', $tagIds)->pluck('tag', 'id')->toArray();

        $total = collect($data)->sum('money');
        $moneyAndTag = collect($data)->pluck('money','tag')->toArray();
        $moneys = [];
        $labels = [];
        foreach ($moneyAndTag as $k => $v){
            $moneys[] = $v;
            $labels[] = $tags[$k];
        }

        $blue = 'green';

        $html = null;

        $style = 'margin-bottom: 2px';
        $labelWidth = 120;
        foreach ($data as $k => $v) {
            $html .= <<<HTML
<div class="d-flex pl-1 pr-1 pt-1" style="{$style}">
    <div style="width: {$labelWidth}px">
        <i class="fa fa-circle text-primary"></i> {$tags[$k]}
    </div>
    <div>￥{$v['money']}</div>
</div>

HTML;
        }
        return compact(['html', 'total', 'moneys','labels']);
    }
}
