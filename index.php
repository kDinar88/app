<?php

include './vendor/autoload.php';

use App\App;

App::init();

try {
    $view = App::$storage['view'];

    $view->assign('title', 'Storefront');
    $view->assign('H1', 'Its Storefront');
    $view->assign('text', 'Text for storefront');

    $view->display('admin/admin.tpl');
} catch (Exception $exception) {
    echo $exception;
}
