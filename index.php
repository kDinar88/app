<?php

include './vendor/autoload.php';

use App\App;

App::init();

try {
    App::$storage['router']->run();
} catch (Exception $exception) {
    echo $exception;
}

