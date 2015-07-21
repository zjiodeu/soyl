<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class StaticController extends Controller
{
	public $layout = '';

    public function actionSkype()
    {
		$this->layout = 'skype';
		
        return $this->render('skype');
    }
}
