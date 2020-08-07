<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Sessions;
use app\model\entities\Basket;
use app\model\Product;
use app\model\repositories\BasketRepository;
use app\model\repositories\ProductRepository;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $session_id = (new Sessions())->getSessionId();
        $basket = (new BasketRepository())->getBasket($session_id);
        echo $this->render('basket', [
            'basket' => $basket,
            'summ' => (new BasketRepository())->getSummBasket($session_id)
        ]);
    }

    public function actionBuy()
    {
        $id = (int)(new Request())->getParams()['id'];
        $session_id = (new Sessions())->getSessionId();
        $product = (new ProductRepository())->getOne($id);
        $basket = new Basket($session_id, $id, $product->price);
        (new BasketRepository())->save($basket);
        $response['count'] = (new BasketRepository())->getCountWhere('session', $session_id);
        $response['summ'] = (new BasketRepository())->getSummBasket($session_id);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function actionDelete()
    {
        $id = (int)(new Request())->getParams()['id'];
        $session_id = (new Sessions())->getSessionId();
        $basket = (new BasketRepository())->getOne($id);
        if ($session_id === $basket->session) {
            (new BasketRepository())->delete($basket);
        }

        header('Content-Type: application/json');
        echo json_encode([
            'errors' => 0,
            'id' => $id,
            'count' => (new BasketRepository())->getCountWhere('session', $session_id),
            'summ' => (new BasketRepository())->getSummBasket($session_id)
        ]);
    }
}