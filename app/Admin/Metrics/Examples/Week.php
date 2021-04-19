<?php

namespace App\Admin\Metrics\Examples;

use App\Models\Bill;
use Carbon\Carbon;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\ApexCharts\Chart;
use Illuminate\Support\Facades\DB;

class Week extends Chart
{
    public function __construct($containerSelector = null, $options = [])
    {
        parent::__construct($containerSelector, $options);
        $this->title('近七天消费');
        $this->setUpOptions();
    }

    /**
     * 初始化图表配置
     */
    protected function setUpOptions()
    {
        $color = Admin::color();

        $colors = [$color->success(), $color->warning()];

        $this->options([
            'colors' => $colors,
            'chart' => [
                'type' => 'area',
                'height' => 430,
                'zoom' => [
                    'enabled' => false
                ]
            ],

            'dataLabels' => [
                'enabled' => true,
            ],
            'stroke' => [
                'curve' => 'straight'
            ],
            'xaxis' => [
                'categories' => [],
            ],

        ]);
    }

    /**
     * 处理图表数据
     */
    protected function buildData()
    {
        $order = $data = Bill::query()->where('user_id', 1)
            ->whereBetween('created_at', [
                Carbon::now()->modify('-7 days')->format('Y-m-d 00:00:00'),
                Carbon::now()->format('Y-m-d H:i:s'),
            ])
            ->where('type',1)
            ->groupBy('created_at')
            ->selectRaw("sum(money) as money,DATE_FORMAT(`created_at`,'%Y-%m-%d') as create_time")
            ->orderBy('create_time')
            ->get();
        // 执行你的数据查询逻辑
        $data = [
            [
                'name' => '消费',
                'data' => $order->pluck('money')->toArray()
            ]
        ];
        $categories = $order->pluck('create_time')->toArray();

        $this->withData($data);
        $this->withCategories($categories);
    }

    /**
     * 设置图表数据
     *
     * @param array $data
     *
     * @return $this
     */
    public function withData(array $data)
    {
        return $this->option('series', $data);
    }

    /**
     * 设置图表类别.
     *
     * @param array $data
     *
     * @return $this
     */
    public function withCategories(array $data)
    {
        return $this->option('xaxis.categories', $data);
    }

    /**
     * 渲染图表
     *
     * @return string
     */
    public function render()
    {
        $this->buildData();

        return parent::render();
    }
}
