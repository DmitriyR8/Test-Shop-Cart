<?php

namespace App\Admin\Controllers;

use App\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

/**
 * Class ProductController
 * @package App\Admin\Controllers
 */
class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Products';

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
     * Create interface
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create Product')
            ->description('description')
            ->body($this->form());
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
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Product::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->title('Title')->style('max-width:200px; word-break:break-all; ');
            $grid->description('Description')->style('max-width:200px; word-break:break-all; ');
            $grid->img('Image')->style('max-width:200px; word-break:break-all; ');
            $grid->price('Price')->style('max-width:200px; word-break:break-all; ');

            $grid->disableExport();
            $grid->disableColumnSelector();

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
        return Admin::show(Product::findOrFail($id), function (Show $show) {
            $show->id('id');
            $show->title('title');
            $show->description('description');
            $show->img('img');
            $show->price('price');
            $show->created_at('created_at');
            $show->updated_at('updated_at');

            return $show;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Product::class, function (Form $form) {
            $form->text('title', 'Title')
                ->rules('required|max:255')
                ->updateRules(['required']);
            $form->ckeditor('description', 'Description')
                ->rules('required')
                ->updateRules(['required']);
            $form->image('img', 'Image');
            $form->decimal('price', 'Price')
                ->rules('required')
                ->updateRules(['required']);

            $form->footer(function ($footer) {
                $footer->disableViewCheck();
                $footer->disableEditingCheck();
                $footer->disableCreatingCheck();
            });

            return $form;
        });
    }
}
