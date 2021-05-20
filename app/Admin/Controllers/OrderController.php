<?php

namespace App\Admin\Controllers;

use App\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

/**
 * Class OrderController
 * @package App\Admin\Controllers
 */
class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Orders';

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
        return Admin::grid(Order::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->product_id('Product ID')->style('max-width:200px; word-break:break-all; ');
            $grid->user_id('User ID')->style('max-width:200px; word-break:break-all; ');
            $grid->shipping_id('Shipping ID')->style('max-width:200px; word-break:break-all; ');
            $grid->total_price('Total Price')->style('max-width:200px; word-break:break-all; ');

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
        return Admin::show(Order::findOrFail($id), function (Show $show) {
            $show->panel()->tools(function ($actions){
                $actions->disableEdit();
            });

            return $show;
        });
    }
}
