<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Sessions;
use app\model\entities\Basket;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $session_id = (new Sessions())->getSessionId(); //TODO сделать через компонент App
        $basket = App::call()->basketRepository->getBasket(session_id());
        echo $this->render('basket', [
            'products' => $basket,
            'summ' => App::call()->basketRepository->getSummBasket($session_id)
        ]);
    }

    public function actionBuy()
    {
        $id = (int)App::call()->request->getParams()['id'];
        $basket = new Basket(session_id(), $id);
        App::call()->basketRepository->save($basket);
        $response['count'] = App::call()->basketRepository->getCountWhere('session_id', session_id());
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function actionDelete()
    {
        $id = App::call()->request->getParams()['id'];
        $session = session_id();
        $basket = App::call()->basketRepository->getOne($id);
        if ($session === $basket->session_id) {
            App::call()->basketRepository->delete($basket);
        }

        header('Content-Type: application/json');
        echo json_encode([
            'errors' => 0,
            'id' => $id,
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ]);
    }
}