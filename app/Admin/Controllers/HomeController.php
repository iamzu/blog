<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\Examples;
use App\Http\Controllers\Controller;
use Dcat\Admin\Http\Controllers\Dashboard;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('首页')
            ->body(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->row(function (Row $row) {
                        $row->column(4,new Examples\Orders());
                        $row->column(4,new Examples\Days());
                        $row->column(4,new Examples\TotalUsers());
                    });
                });
                $row->column(12, function (Column $column) {
                    $column->row(function (Row $row) {
//                        $row->column(12,new Examples\Week());
                    });
                });
                $row->column(12,new Examples\Month());

            });
    }
}
