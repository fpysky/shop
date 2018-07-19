<?php

namespace App\Admin\Controllers;

use App\Models\ProductClassify;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProductClassifyController extends Controller
{
    use ModelForm;

    public function getRootClassify(){
        $arr = [['id' => 0,'text' => 'root']];
        $list = ProductClassify::getRootClassify();
        if(!empty($list)){
            foreach($list as $k => $v){
                $r['id'] = $v['id'];
                $r['text'] = $v['name'];
                $arr[] = $r;
            }
        }
        return $arr;
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('商品分类');
            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('编辑商品分类');
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('创建商品分类');
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(ProductClassify::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->name('分类名');
            $grid->pid('父分类ID');
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(ProductClassify::class, function (Form $form) {
            $form->select('pid','选择父分类')->options('/admin/productClassify/getRootClassify');
            $form->text('name', '分类名')->rules('required');
        });
    }
}
