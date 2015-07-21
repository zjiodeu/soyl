<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */


?>
<div class="categories-view">

        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
			'name:ntext',
            'age:ntext',
            'email:ntext',
            'tel:ntext',
            'skype:ntext',
            'city:ntext',
            'work:ntext',
        ],
    ]) ?>
  <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
