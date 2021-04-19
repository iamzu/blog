<?php

namespace App\Admin\Metrics\Examples;

use App\Models\Bill;
use Carbon\Carbon;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Metrics\Line;
use Illuminate\Http\Request;

class Days extends Line
{
    /**
     * 初始化卡片内容
     *
     * @return void
     */
    protected function init()
    {
        parent::init();

        $this->title('近日消费');
        $this->dropdown([
            '7' => '7天',
            '14' => '14天',
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

        $time = null;
        switch ($request->get('option')) {
            case '14':
                $time = Carbon::now()->modify('-14 days')->format('Y-m-d 00:00:00');
                break;
            case '7':
            default:
                $time = Carbon::now()->modify('-7 days')->format('Y-m-d 00:00:00');
                break;

        }
        $data = Bill::query()->where('user_id', 1)
            ->whereBetween('created_at', [
                $time,
                Carbon::now()->format('Y-m-d H:i:s'),
            ])
            ->where([
                ['type',1],
                ['user_id',Admin::user()->id]
            ])
            ->groupBy('created_at')
            ->selectRaw("sum(money) as money,DATE_FORMAT(`created_at`,'%Y-%m-%d') as create_time")
            ->orderBy('create_time')
            ->get();
        $this->withContent($data->sum('money'));
        // 图表数据
        $this->withChart($data->pluck('money')->toArray());
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
            'series' => [
                [
                    'name' => '金额',
                    'data' => $data,
                ],
            ],
        ]);
    }

    /**
     * 设置卡片内容.
     *
     * @param string $content
     *
     * @return $this
     */
    public function withContent($content)
    {
        return $this->content(
            <<<HTML
<div class="d-flex justify-content-between align-items-center mt-1" style="margin-bottom: 2px">
    <h2 class="ml-1 font-lg-1">￥{$content}</h2>
    <span class="mb-0 mr-1 text-80">{$this->title}</span>
</div>
HTML
        );
    }
}
