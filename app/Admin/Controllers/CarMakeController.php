<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use App\Models\CarMake;
use App\Models\CarModel;

class CarMakeController extends Controller
{
    use HasResourceActions;
    /**
     * Title for current resource.
     *
     * @var string
     */
    // protected $title = 'CarMake';

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        \Session::forget('error');
        return $content
            ->header('Car Make')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        \Session::forget('error');

        return $content
            ->header('Detail')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        \Session::forget('error');

        return $content
            ->header('Car Make')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */

    public function create( Content $content)
    {
        \Session::forget('error');

        return $content
            ->header('Car Make')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        \Session::forget('error');
        $grid = new Grid(new CarMake());

        $grid->disableFilter();
        $grid->disableColumnSelector();
        $grid->disableExport();

        $grid->actions(function ($actions) {
			$actions->disableView();
        });

        $grid->column('id', __('Id'));
        $grid->column('name_en', __('Name en'));
        $grid->column('name_ar', __('Name ar'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        \Session::forget('error');

        $show = new Show(CarMake::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name_en', __('Name en'));
        $show->field('name_ar', __('Name ar'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CarMake());

        $form->tools(function (Form\Tools $tools) {
            // Disable `Veiw` btn.
            $tools->disableView();
            // Disable `Delete` btn.
            $tools->disableDelete();
        });

        $form->footer(function ($footer) {
            // disable `View` checkbox
            $footer->disableViewCheck();

            // disable reset btn
            $footer->disableReset();
        });

        $form->tab('Make', function ($form) {
            $form->text('name_en', __('Name English'));
            $form->text('name_ar', __('Name Arabic'));
        });

        $form->tab('Model', function ($form) {
            $form->hasMany('models', 'Model', function (Form\NestedForm $form){
                $form->text('name_en','Name English')->rules('required');
                $form->text('name_ar','Name Arabic')->rules('required');
            });
        });
        return $form;
    }
}
