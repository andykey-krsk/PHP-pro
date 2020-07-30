<?php

namespace app\controllers;

use app\model\Basket;
use app\engine\Request;
use app\model\Product;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('basket', [
            'basket' => Basket::getBasket(session_id()),
            'total_price' => Basket::getSummWhere('session', session_id())
        ]);
    }

    public function actionBuy()
    {
        $id = (int)(new Request())->getParams()['id'];
        (new Basket(session_id(), $id, Product::getOne($id)->price, 1))->save();
        $response['count'] = Basket::getCountWhere('session', session_id());
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function actionDelete()
    {
        $id = (int)(new Request())->getParams()['id'];
        Basket::getOne($id)->delete();
        $response['count'] = Basket::getCountWhere('session', session_id());
        $response['total'] = Basket::getSummWhere('session', session_id());
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }


    /////////////////////////////////////////////////////////
    public function actionBuy_()
    {
        $session = session_id();
        $quantyti = 1;
        $basket = new Basket("{$_POST['product_id']}", "{$_POST['product_price']}", "{$quantyti}", "{$session}");
        $basket->save();
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }

    public function actionDelete_()
    {
        $id = (int)$_GET['id'];
        Basket::getOne($id)->delete();
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}