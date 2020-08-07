<?php

namespace app\controllers;

use app\engine\Request;
use app\model\entities\Feedback;
use app\model\repositories\FeedbackRepository;

class FeedbackController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('feedback', [
            'feedback' => (new FeedbackRepository())->getAll()
        ]);
    }

    public function actionEdit()
    {
        $id = (int)(new Request())->getParams()['id'];
        echo $this->render('feedback', [
            'feedback' => (new FeedbackRepository())->getAll(),
            'feedback_form' => (new FeedbackRepository())->getOne($id)
        ]);
    }

    public function actionDelete()
    {
        $id = (int)(new Request())->getParams()['id'];
        (new FeedbackRepository())->getOne($id)->delete();
        header("Location: /feedback/");
    }

    public function actionSave()
    {
        //$id = (int)$_POST['feedback_id'];
        $id = (int)(new Request())->getParams()['feedback_id'];
        if ($id == 0) {
            $feedback_name = (new Request())->getParams()['feedback_name'];
            $feedback_text = (new Request())->getParams()['feedback_text'];
            $feedback = new Feedback("{$feedback_name}", "{$feedback_text}");
        } else {
            $feedback = (new FeedbackRepository())->getOne($id);
            $feedback->name = (new Request())->getParams()['feedback_name'];
            $feedback->feedback = (new Request())->getParams()['feedback_text'];
        }
        (new FeedbackRepository())->save($feedback);
        header("Location: /feedback/");
    }
}