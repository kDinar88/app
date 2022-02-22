<?php

namespace App;

use Bramus\Router\Router;
use Pimple\Container;
use App\Enums\Area;
use App\Controllers\Admin\ProductsController;
use App\Controllers\AuthController;

class App extends Container
{
    /**
     * @var array
     */
    public static $storage = [];

    /**
     * @var
     */
    private static $area = Area::STOREFRONT;

    /**
     * @return void
     */
    public static function init()
    {
        if (empty(self::$storage)) {
            self::$storage = new parent();
        }

        self::$storage['time'] = time();

        self::$storage['view'] = static function () {
            $smarty = new \Smarty();

            $smarty->setTemplateDir('./resources/templates');
            $smarty->setConfigDir('./resources/configs');
            $smarty->setCompileDir('./resources/compiles');
            $smarty->setCacheDir('./resources/cache');

            return $smarty;
        };

        self::initRouts();

        session_start();
    }

    protected static function initRouts(): void
    {
        $router = new Router();
        $router->get('/admin', fn () => (self::$area = AREA::ADMIN) && (new AuthController())->authForm());
        $router->post('/admin', fn () => (self::$area = AREA::ADMIN) && (new AuthController())->auth());

        $router->get(
            '/admin/products',
            fn () => (self::$area = AREA::ADMIN) && (new ProductsController())->productList()
        );
        $router->get(
            '/admin/products/(\d+)',
            fn ($id) => (self::$area = AREA::ADMIN) && (new ProductsController())->product($id)
        );

        $router->get(
            '/admin/orders',
            fn () => (self::$area = AREA::ADMIN) && (new OrdersController())->orderList()
        );
        $router->get(
            '/admin/orders/(\d+)',
            fn ($id) => (self::$area = AREA::ADMIN) && (new ProductsController())->order($id)
        );

        self::$storage['router'] = $router;
    }

    public static function isAdmin()
    {
        return self::$area === Area::ADMIN;
    }

    public static function isStorefront()
    {
        return self::$area === Area::STOREFRONT;
    }
}
