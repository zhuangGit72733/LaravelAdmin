<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\User;

class ArticlesController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
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
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('title', '标题');
        });

        $grid->id('序号')->sortable();
        $grid->title('标题');
        $grid->column('user.name','作者');
        $grid->column('category.name', '分类');
        $grid->column('image', '头像')->display(function ($v){
            return '<img style="width:100px;height:100px;" src="'.$v.'"/>';
        });
        $grid->created_at('创建时间');
        $grid->updated_at('更新时间');

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
        $show = new Show(Article::findOrFail($id));

        $show->id('序号');
        $show->title('标题');
        $show->content('内容');
        $show->user_id('作者');
        $show->category_id('分类');
        $show->image('头像');
        $show->created_at('创建时间');
        $show->updated_at('更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);

        $form->text('title', '标题')->rules('required|max:10', [
            'required' => '标题不能为空',
            'max' => '标题不能超过10个字'
        ]);
        $form->textarea('content', '内容')->rules('required',[
            'required' => '内容不能为空'
        ]);
        $form->select('user_id', '作者')->options(User::all()->pluck('name','id'))->rules('required|exists:users,id', [
            'required' => '作者不能为空',
            'exists' => '作者必须存在'
        ]);
        $form->select('category_id', '分类')->options(Category::all()->pluck('name','id'))->rules('required|exists:categories,id', [
            'required' => '分类不能为空',
            'exists' => '分类必须存在'
        ]);
        $form->image('image', '头像')->rules('required|max:200*1024|image', [
            'required' => '头像不能为空',
            'image' => '头像样式不符',
            'max' => '头像大小不能超过200K',
        ]);

        return $form;
    }
}
