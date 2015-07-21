<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Reviews;

class ReviewsController extends Controller
{

    public function actionIndex()
    {
	
		$reviews = \app\models\Reviews::find()->all();
		
        return $this->render('index', ['reviews' => $rewiews]);
    }
}
