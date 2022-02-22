<?php

namespace App\Controllers;

use App\App;

class AuthController
{
    protected $view;

    public function __construct()
    {
        $this->view = App::$storage['view'];
    }

    public function authForm()
    {
        if (App::isAdmin()) {
            $this->view->display('admin/auth.form.tpl');
        } else {
            $this->view->display('storefront/auth.form.tpl');
        }
    }

    public function auth()
    {
        if (isset($_POST['email'], $_POST['password'])) {
            // проверяем и пишем в сессию что все норм затем редиректим на страницу куда нужно
        }

        // иначе редиректим обратно
        // для примера я тут просто тот же шаблон возвращаю и все
        if (App::isAdmin()) {
            $this->view->display('admin/auth.form.tpl');
        } else {
            $this->view->display('storefront/auth.form.tpl');
        }
    }
}
