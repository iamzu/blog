<?php

namespace App\Admin\Metrics\Examples;

use App\Models\Bill;
use App\Models\BillType;
use Carbon\Carbon;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Metrics\Round;
use Illuminate\Http\Request;

class Orders extends Round
{
    /**
     * 初始化卡片内容
     */
    protected function init()
    {
        parent::init();

        $this->title('账单');
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
        switch ($request->get('option')) {
            case '30':
            case '0':
            default:
                $this->chartLabels($arr['labels']);
                // 卡片内容
                $this->content($arr['html']);
                // 图表数据
                $this->withChart($arr['moneys']);
                // 总数
                $this->chartTotal('总金额',$arr['total']);
        }
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
        $data = Bill::query()->where('user_id', 1)
            ->whereBetween('created_at', $whereBetween)
            ->where('type',1)
            ->groupBy('parent_tag_id')
            ->selectRaw('parent_tag_id as tag,sum(money) as money')
            ->orderBy('money','desc')
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

        $html = '<div class="col-12 d-flex flex-column flex-wrap text-center" style="max-width: 220px">';

        foreach ($data as $k => $v) {
            $html .= <<<HTML
    <div class="chart-info d-flex justify-content-between mb-1 mt-2" >
          <div class="series-info d-flex align-items-center">
              <i class="fa fa-circle-o text-bold-700 " style="color: {$blue}"></i>
              <span class="text-bold-600 ml-50">{$tags[$k]}</span>
          </div>
          <div class="product-result">
              <span>￥{$v['money']}</span>
          </div>
    </div>
HTML;
        }
        $html .= '</div>';
        return compact(['html', 'total', 'moneys','labels']);
    }
}
