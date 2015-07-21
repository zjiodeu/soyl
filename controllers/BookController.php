<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Books;
use app\models\BooksSubcr;

class BookController extends Controller
{
	public $layuot = "";

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
		$books = \app\models\Books::find()->all();
		
		$subcr = new BooksSubcr();
		
		if ($subcr->load(Yii::$app->request->post())) {
		
			$subcr->book_id = $subcr->hiddenId;
			
			$subcr->save();
			
			return $this->render('index', ['books' => $books, 'subcr' => new BooksSubcr(), 'success' => true]);
		}else{
			return $this->render('index', ['books' => $books, 'subcr' => $subcr]);
		}
    }

}
