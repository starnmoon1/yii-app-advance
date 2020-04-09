<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class DemoController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionHello()
    {
        return $this->render('Hello');
    }

}