<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Categories;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'gr')->dropDownList(
		ArrayHelper::map(Categories::find()->all(), 'gr_id', 'name'),
		['prompt' => 'Выберите категорию']
	) ?>
    <?php
		echo $form->field($model, 'content')->widget(Widget::className(), [
			'settings' => [
				'lang' => 'ru',
				'minHeight' => 200,
				'imageUpload' => Url::to(['article/upload']),
				'plugins' => [
					'clips',
					'video'
				]
			]
		]);
	?>
	<?= $form->field($model, 'title')->textarea(['rows' => 2]) ?>
	
    <?= $form->field($model, 'file')->fileInput() ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::a('Отмена', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
