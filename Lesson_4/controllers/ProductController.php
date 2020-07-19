<?php

namespace app\controllers;

use app\model\Product;

class ProductController extends Controller
{


    public function actionIndex()
    {
        echo $this->render('catalog', [
            'catalog' => Product::getAll()
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