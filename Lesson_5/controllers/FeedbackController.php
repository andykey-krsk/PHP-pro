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
            'feedback' => Feedback::getAll(),
            'feedback_form' => Feedback::getOne($id)
        ]);
    }

    public function actionDelete()
    {
        $id = (int)$_GET['id'];
        Feedback::getOne($id)->delete();
        header("Location: /feedback/");
    }

    public function actionSave()
    {
        $id = (int)$_POST['feedback_id'];
        if ($id == 0) {
            $feedback = new Feedback("{$_POST['feedback_name']}", "{$_POST['feedback_text']}");
        } else {
            $feedback = Feedback::getOne($id);
            $feedback->name = $_POST['feedback_name'];
            $feedback->feedback = $_POST['feedback_text'];
        }
        $feedback->save();
        header("Location: /feedback/");
    }
}