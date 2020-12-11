<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Tree\BlogMenuShow;
use App\Admin\Repositories\BlogMenu;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Actions\Menu\Visiable;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Tree;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Widgets\Box;
use Dcat\Admin\Widgets\Form as TreeForm;

class BlogMenuController extends AdminController
{

    protected $title = '博客菜单';

    public function index(Content $content)
    {
        return $content->header($this->title)
            ->body(function (Row $row) {
                $tree = new Tree(new BlogMenu());
                $row->column(6, $tree);
                $tree->branch(function ($branch) {
                    $payload = "<i class='fa {$branch['icon']}'></i>&nbsp;<strong>{$branch['title']}</strong>";
                    $uri = $branch['uri'];
                    $payload .= "&nbsp;&nbsp;&nbsp;<a href=\"$uri\" target='_blank' class=\"dd-nodrag\">$uri</a>";
                    return $payload;
                });
                $tree->disableCreateButton();
                $tree->disableQuickCreateButton();
                $tree->disableEditButton();
                $tree->actions(function (Tree\Actions $actions) {
                    if ($actions->getRow()->extension) {
                        $actions->disableDelete();
                    }

                    $actions->prepend(new BlogMenuShow());
                });


                $row->column(6, function (Column $column) {
                    $form = new TreeForm();
                    $form->action(admin_url('/blog-menus'));
                    $form->text('title', trans('admin.title'))->required();
                    $form->icon('icon', trans('admin.icon'))->help($this->iconHelp());
                    $form->text('uri', trans('admin.uri'));

                    $form->hidden('_token')->default(csrf_token());

                    $form->width(9, 2);

                    $column->append(Box::make(trans('admin.new'), $form));
                });
            });
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
        return Show::make($id, new BlogMenu(), function (Show $show) {
            $show->field('id');
            $show->field('order');
            $show->field('title');
            $show->field('icon');
            $show->field('uri');
            $show->field('show');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new BlogMenu(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->icon('icon', trans('admin.icon'))->help($this->iconHelp());
            $form->text('uri');
            $form->switch('show', trans('admin.show'));
            $form->display('created_at');
            $form->display('updated_at');
        });
    }

    /**
     * Help message for icon field.
     *
     * @return string
     */
    protected function iconHelp()
    {
        return 'For more icons please see <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>';
    }
}
