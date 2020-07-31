<?php

namespace app\controllers;

use app\engine\Request;
use app\model\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = (int)(new Request())->getParams()['page'];
        echo $this->render('catalog', [
            'catalog' => (new ProductRepository())->getLimit(($page + 1) * 2),
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = (int)(new Request())->getParams()['id'];
        echo $this->render('card', [
            'product' => (new ProductRepository())->getOne($id)
        ]);
    }
}