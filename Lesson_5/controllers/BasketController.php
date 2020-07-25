<?php

namespace app\controllers;

use app\model\Basket;

class BasketController extends Controller
{
    public function actionIndex()
    {
      echo $this->render('basket' , [
          'basket' => Basket::getBasket(session_id()),
        ]);
    }

    public function actionBuy()
    {
        $session = session_id();
        $page = $_POST['page'];
        $quantyti = 1;
        $basket = new Basket("{$_POST['product_id']}", "{$_POST['product_price']}", "{$quantyti}", "{$session}");
        $basket->save();

        header("Location: {$page}");
    }

    public function actionDelete()
    {
        $id = (int)$_GET['id'];
        Basket::getOne($id)->delete();
        header("Location: /basket/");
    }
}