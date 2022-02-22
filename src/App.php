<?php

namespace App;

use Pimple\Container;
use App\Enums\Area;

class App extends Container
{
    /**
     * @var array
     */
    public static $storage = [];

    /**
     * @var
     */
    private static $area;

    /**
     * @return void
     */
    public static function init($area = Area::STOREFRONT)
    {
        self::$area = $area;

        if (empty(self::$storage)) {
            self::$storage = new parent();
        }

        self::$storage['time'] = time();

        /** @var \Smarty  self::$storage['view'] */
        self::$storage['view'] = static function() {
            $smarty = new \Smarty();

            $smarty->setTemplateDir('./resources/templates');
            $smarty->setConfigDir('./resources/configs');
            $smarty->setCompileDir('./resources/compiles');
            $smarty->setCacheDir('./resources/cache');

            return $smarty;
        };
    }
}
