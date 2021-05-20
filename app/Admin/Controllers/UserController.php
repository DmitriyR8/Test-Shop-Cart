<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

/**
 * Class UserController
 * @package App\Admin\Controllers
 */
class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Users';

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
        return Admin::grid(User::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->name('Name')->style('max-width:200px; word-break:break-all; ');
            $grid->email('Email')->style('max-width:200px; word-break:break-all; ');
            $grid->phone('Phone')->style('max-width:200px; word-break:break-all; ');

            $grid->disableExport();
            $grid->disableCreateButton();
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
        return Admin::show(User::findOrFail($id), function (Show $show) {
            $show->id('id');
            $show->name('name');
            $show->email('email');
            $show->phone('phone');
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
        return Admin::form(User::class, function (Form $form) {
            $form->text('name', 'Name')
                ->rules('required|max:255')
                ->updateRules(['required']);
            $form->email('email', 'Email')
                ->rules('required|max:255|unique:users')
                ->updateRules(['required', 'unique:users']);
            $form->mobile('phone','Phone')
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
