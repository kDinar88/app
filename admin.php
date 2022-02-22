<?php

include './vendor/autoload.php';

use App\App;
use App\Enums\Area;

App::init(Area::ADMIN);

try {
    $view = App::$storage['view'];

    $view->assign('title', 'Admin');
    $view->assign('H1', 'Its Admin panel!');
    $view->assign('text', 'Text for admin panel');

    $view->display('admin/admin.tpl');
} catch (Exception $exception) {
    echo $exception;
}
