<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Articles;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;


class ArticleController extends Controller
{

	public $layout = 'admin';
	
	public function actions()
	{
		return [
			'upload' => [
				'class' => 'vova07\imperavi\actions\UploadAction',
				'url' => 'img/uploads/', // Directory URL address, where files are stored.
				'path' => '@webroot/img/uploads' // Or absolute path to directory where files are stored.
			],
		];
	}
	
    public function actionIndex()
    {
		$provider = new ActiveDataProvider([
			'query' => \app\models\Articles::find(),
			'pagination' => [
				'pageSize' => 3,
			],
		]);
		
		//$all_categories = \app\models\Categories::find()->all();

        return $this->render('index', ['dataProvider' => $provider]);
    }
	
	public function actionView($id)
    {	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articles();
		
        if ($model->load(Yii::$app->request->post())) {
			$imageName = date('his');
			$model->file = UploadedFile::getInstance($model, 'file');
			if($model->file != null){
				$model->file->saveAs('img/blog_covers/'.$imageName.'.'.$model->file->extension);
		
				$model->img_path = 'img/blog_covers/'.$imageName.'.'.$model->file->extension;
			}
			$model->save();
			
			return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			
			$imageName = date('his');
			$model->file = UploadedFile::getInstance($model, 'file');
			
			if($model->file != null){
				if($model->img_path != "" && file_exists($model->img_path)){
					unlink($model->img_path);
				}
				$model->file->saveAs('img/blog_covers/'.$imageName.'.'.$model->file->extension);
			
				$model->img_path = 'img/blog_covers/'.$imageName.'.'.$model->file->extension;
			}else{
				$model->img_path = $model->img_path;
			}
			$model->save();
			
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
