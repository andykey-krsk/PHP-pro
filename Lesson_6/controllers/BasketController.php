<?php

namespace app\controllers;

use app\model\Basket;
use app\engine\Request;

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
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }

    public function actionBuyA() {
        // $data = json_decode(file_get_contents('php://input'));

        $id = (int)(new Request())->getParams()['id'];

        (new Basket(session_id(), $id))->save();

        $response['count'] = Basket::getCountWhere('session_id', session_id());
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function actionDelete()
    {
        $id = (int)$_GET['id'];
        Basket::getOne($id)->delete();
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}