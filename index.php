<?php

include './vendor/autoload.php';

use App\App;

App::init();

try {
    App::$storage['phpinfo_callback'] = 'phpinfo';
    App::$storage['phpinfo_callback']();
} catch (Exception $exception) {
    echo $exception;
}
