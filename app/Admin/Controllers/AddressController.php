<?php

namespace App\Admin\Controllers;

use App\Address;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

/**
 * Class AddressController
 * @package App\Admin\Controllers
 */
class AddressController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Addresses';

    /**
     * Index interface
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header($this->title)
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Address::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->user_id('User ID')->style('max-width:200px; word-break:break-all; ');
            $grid->address('Address')->style('max-width:200px; word-break:break-all; ');
            $grid->paginate(10);

            $grid->disableCreateButton();
            $grid->disableExport();
            $grid->disableColumnSelector();
            $grid->actions(function ($actions){
                $actions->disableEdit();
            });


            return $grid;
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        return Admin::show(Address::findOrFail($id), function (Show $show) {
            $show->panel()->tools(function ($actions){
                $actions->disableEdit();
            });

            return $show;
        });
    }
}
