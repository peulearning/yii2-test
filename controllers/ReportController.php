<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Post;

class ReportController extends Controller
{
    public function actionIndex()
    {
        $posts = Post::find()->with('user')->all();
        return $this->render('index', ['posts' => $posts]);
    }
}
