<?php

namespace app\controllers;

use yii\data\ActiveDataProvider;

class BlogController extends \yii\web\Controller
{
    public function actionIndex($gr_id = '')
    {
		if($gr_id != ''){
		
			$provider = new ActiveDataProvider([
				'query' => \app\models\Articles::find()->where(['gr' => $gr_id]),
				'pagination' => [
					'pageSize' => 10,
				],
			]);
			
			//$articles = \app\models\Articles::find()->where(['gr' => $gr_id])->all();
			
			return $this->render('index', ['articles' => $provider]);
		}
		else
		{
			$provider = new ActiveDataProvider([
				'query' => \app\models\Articles::find(),
				'pagination' => [
					'pageSize' => 10,
				],
			]);
			return $this->render('index', ['articles' => $provider]);
		}
        
    }
	
	public function actionReadmore($artic_id)
	{
		$article = \app\models\Articles::findOne($artic_id);
		
		return $this->render('readmore', ['article' => $article]);
	}

}
