<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Rotation;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class RotationController extends AdminController
{
    protected $title = '轮播图';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(
            new Rotation(),
            function (Grid $grid) {
                $grid->model()->orderBy('id','desc');
                $grid->column('id')->sortable();
                $grid->column('name')->editable(true);
                $grid->column('image','图片')->display(function(){
                    return $this->thumbnail('small','image');
                })->image();
                $grid->column('status','状态')->switch();
                $grid->column('url')->editable(true);
                $grid->column('created_at');
                $grid->column('updated_at')->sortable();

                $grid->filter(
                    function (Grid\Filter $filter) {
                        $filter->like('name');
                    }
                );
            }
        );
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make(
            $id,
            new Rotation(),
            function (Show $show) {
                $show->field('id');
                $show->field('name');
                $show->field('image');
                $show->field('status');
                $show->field('url');
                $show->field('created_at');
                $show->field('updated_at');
            }
        );
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(
            new Rotation(),
            function (Form $form) {
                $form->display('id');
                $form->text('name')->required()->rules('max:10', ['max' => '名称长度不可超过10'])->maxLength(10);
                $form->image('image')->rules('required', ['required' => '请上传图片'])->thumbnail('small', '1920','1080')->autoUpload();
                $form->switch('status', '状态')->customFormat(function ($v) {
                    return $v === '打开' ? 1 : 0;
                });
                $form->url('url')->required();

                $form->display('created_at');
                $form->display('updated_at');
            }
        );
    }
}
