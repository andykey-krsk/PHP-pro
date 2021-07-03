<?php

namespace app\controllers;

use app\engine\App;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = (int)App::call()->request->getParams()['page'];
        echo $this->render('catalog', [
            'catalog' => App::call()->productRepository->getLimit(($page + 1) * 2),
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = (int)App::call()->request->getParams()['id'];
        echo $this->render('card', [
            'product' => App::call()->productRepository->getOne($id)
        ]);
    }
}