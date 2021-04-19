<?php

namespace App\Admin\Metrics\Examples;

use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Metrics\Bar;
use Illuminate\Http\Request;

class Sessions extends Bar
{
    /**
     * 初始化卡片内容
     */
    protected function init()
    {
        parent::init();

        $color = Admin::color();

        $dark35 = $color->dark35();

        // 卡片内容宽度
        $this->contentWidth(5, 7);
        // 标题
        $this->title('总消费');
        // 设置下拉选项
        $this->dropdown([
            '0' => '本月',
            '30' => '上月',
        ]);
        // 设置图表颜色
        $this->chartColors([
            $dark35,
            $dark35,
            $color->primary(),
            $dark35,
            $dark35,
            $dark35
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
        switch ($request->get('option')) {
            case '7':
            default:
                // 卡片内容
                $this->withContent('2.7k', '');

                // 图表数据
                $this->withChart([
                    [
                        'name' => '消费',
                        'data' => [75,],
                    ],
                    [
                        'name' => '消费',
                        'data' => [ 125, 755],
                    ],
                    [
                        'name' => '消费',
                        'data' => [75, 755],
                    ],
                    [
                        'name' => '消费',
                        'data' => [75, 75, 125, 755],
                    ],
                ]);
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
     * 设置卡片内容.
     *
     * @param string $title
     * @param string $value
     * @param string $style
     *
     * @return $this
     */
    public function withContent($title, $value, $style = 'success')
    {
        // 根据选项显示
        $label = strtolower(
            $this->dropdown[request()->option] ?? '本月'
        );
        $minHeight = '160px';

        return $this->content(
            <<<HTML
<div class="d-flex p-1 flex-column justify-content-between" style="padding-top: 0;width: 100%;height: 100%;min-height: {$minHeight}">
    <div class="text-left">
        <h1 class="font-lg-2 mt-2 mb-0">{$title}</h1>
        <h5 class="font-medium-2" style="margin-top: 10px;">
            <span class="text-{$style}">{$value} </span>
            <span>{$label}</span>
        </h5>
    </div>

<!--    <a href="#" class="btn btn-primary shadow waves-effect waves-light">View Details <i class="feather icon-chevrons-right"></i></a>-->
</div>
HTML
        );
    }
}
