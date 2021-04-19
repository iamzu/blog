<?php

namespace App\Admin\Metrics\Examples;

use App\Models\Bill;
use Carbon\Carbon;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Metrics\Card;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class TotalUsers extends Card
{
    /**
     * 卡片底部内容.
     *
     * @var string|Renderable|\Closure
     */
    protected $footer;

    /**
     * 初始化卡片.
     */
    protected function init()
    {
        parent::init();

        $this->title('总消费');
        $this->dropdown([
            '0' => '本月',
            '30' => '上月',
        ]);
    }

    /**
     * 处理请求.
     *
     * @param Request $request
     *
     * @return void
     */
    public function handle(Request $request)
    {
        switch ($request->get('option')) {
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
            ->sum('money');
        $this->content($data / 100);
        $this->up(15);
    }

    /**
     * @param int $percent
     *
     * @return $this
     */
    public function up($percent)
    {
        return $this->footer(
            "<i class=\"feather icon-trending-up text-success\"></i> {$percent}% Increase"
        );
    }

    /**
     * @param int $percent
     *
     * @return $this
     */
    public function down($percent)
    {
        return $this->footer(
            "<i class=\"feather icon-trending-down text-danger\"></i> {$percent}% Decrease"
        );
    }

    /**
     * 设置卡片底部内容.
     *
     * @param string|Renderable|\Closure $footer
     *
     * @return $this
     */
    public function footer($footer)
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * 渲染卡片内容.
     *
     * @return string
     */
    public function renderContent()
    {
        $content = parent::renderContent();

        return <<<HTML
<div class="d-flex justify-content-between align-items-center mt-1" style="margin-bottom: 2px">
    <h2 class="ml-1 font-lg-1">￥{$content}</h2>
</div>
<div class="ml-1 mt-1 font-weight-bold text-80">
    {$this->renderFooter()}
</div>
HTML;
    }

    /**
     * 渲染卡片底部内容.
     *
     * @return string
     */
    public function renderFooter()
    {
        return $this->toString($this->footer);
    }
}
