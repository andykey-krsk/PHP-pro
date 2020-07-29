<?php

namespace app\controllers;

use app\model\Feedback;

class FeedbackController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('feedback', [
            'feedback' => Feedback::getAll()
        ]);
    }

    public function actionEdit()
    {
        $id = (int)$_GET['id'];
        echo $this->render('feedback', [
            'feedback' => Feedback::getOne($id)
        ]);
    }

    public function actionDelete()
    {
        echo $this->render('feedback', [
            'feedback' => $this->elete()
        ]);
    }

    public function actionAdd()
    {
        echo $this->render('feedback', [
            'feedback' => Feedback::save()
        ]);
    }
}