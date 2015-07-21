<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary' => '',
        'columns' => [
            'id',
            //'gr:ntext',
			[
				'attribute' => 'gr',
				'format' => 'raw',
				'value' => function ($model) {
					$a = Categories::find()->where(['gr_id' => $model->gr])->one();
					return $a->name;
				},
			],
            'title:ntext',
			 //[
				//'attribute' => 'content',
				//'format' => 'html',
				//'label' => 'Name',
			//],
			[
				'attribute' => 'img_path',
				'format' => 'raw',
				'value' => function ($model) {
					return '<img style="width:250px;" class="image-responsible" alt="Responsive image" src="'
					.$model->img_path. '">';
				},
			],
           //'content:html:ntext',
            //'img_path:image:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
