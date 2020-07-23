<?php

namespace app\controllers;

use app\model\Product;

class ProductController extends Controller
{


    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = (int)$_GET['page'];

        echo $this->render('catalog', [
            'catalog' => Product::getLimit(($page + 1) * 2),
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = (int)$_GET['id'];
        echo $this->render('card', [
            'product' => Product::getOne($id)
        ]);
    }



}