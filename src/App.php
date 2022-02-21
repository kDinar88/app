<?php

namespace App;

use Pimple\Container;

class App extends Container
{
    /**
     * @var array
     */
    public static $storage = [];

    /**
     * @return void
     */
    public static function init()
    {
        if (empty(self::$storage)) {
            self::$storage = new parent();
        }
    }
}
