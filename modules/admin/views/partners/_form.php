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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 1]) ?>
    <?= $form->field($model, 'age')->textarea(['rows' => 1]) ?>
    <?= $form->field($model, 'email')->textarea(['rows' => 1]) ?>
    <?= $form->field($model, 'tel')->textarea(['rows' => 1]) ?>
    <?= $form->field($model, 'skype')->textarea(['rows' => 1]) ?>
    <?= $form->field($model, 'city')->textarea(['rows' => 1]) ?>
    <?= $form->field($model, 'work')->textarea(['rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::a('Отмена', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
