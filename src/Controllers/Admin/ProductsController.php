<?php

namespace App\Controllers\Admin;

use App\App;

class ProductsController
{
    protected $view;

    public function __construct()
    {
        $this->view = App::$storage['view'];
    }

    public function productList(): void
    {
        $this->view->assign('title', 'Product List');
        $this->view->assign('H1', 'Products');
        $this->view->assign('text', 'Products');

        $this->view->display('admin/products.list.tpl');
    }

    public function product($id): void
    {
        if (empty($id)) {
            $this->view->display('404.tpl');
        }

        $this->view->assign('title', 'Product id = #' . $id);
        $this->view->assign('H1', 'Product id = #' . $id);
        $this->view->assign('text', 'Product info');

        $this->view->display('admin/products.product.tpl');
    }
}