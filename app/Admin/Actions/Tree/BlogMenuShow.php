<?php

namespace App\Admin\Actions\Tree;

use App\Models\BlogMenu;
use Dcat\Admin\Tree\RowAction;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Traits\HasPermissions;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BlogMenuShow extends RowAction
{
    /**
     * @return string
     */
    protected $title = 'Title';

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request)
    {
        $key = $this->getKey();

        $model = BlogMenu::class;
        $menu = $model::find($key);
        $menu->update(['show' => $menu->show ? 0 : 1]);

        return $this
            ->response()
            ->success(trans('admin.update_succeeded'))
            ->location('blog-menus');
    }

    public function title()
    {
        $icon = $this->getRow()->show ? 'icon-eye-off' : 'icon-eye';

        return "&nbsp;<i class='feather $icon'></i>&nbsp;";
    }
}
