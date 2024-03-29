<?php

namespace App\Admin\Controllers;

use App\User;
use App\Models\Role;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('password', __('Password'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        //--Relation--
        $grid->column('profile.age');
        $grid->column('profile.gender');

        $grid->roles()->display(function ($roles) {

            $roles = array_map(function ($role) {
                return "<span class='label label-success'>{$role['name']}</span>";
            }, $roles);
        
            return join('&nbsp;', $roles);
        });
        

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
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
        $form = new Form(new User);
        $form->text('name', __('Name'));
        $form->text('profile.age');
        $form->text('profile.gender');
        $form->email('email', __('Email'));
      //  $form->text('user_roles.name', __('Role'));
        $roles = Role::all();
        $options = $roles->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });
        $form->select('role_user.role_id', __('Role'))->options($options);
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
