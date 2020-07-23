<?php


namespace app\controllers;


class BasketController extends Controller
{
    public function actionIndex()
    {
      echo $this->render('basket' , [
            'basket' => 123
            //'basket' => Basket::getBasket();
        ]);
    }
}