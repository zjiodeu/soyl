<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{

	public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
