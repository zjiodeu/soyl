<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */

$this->title = $model->title;

?>
<div class="categories-view">

    <h1><?= Html::encode($this->title) ?></h1>

  

        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'gr:ntext',
            'title:ntext',
            'content:html',
            'img_path:image',
        ],
    ]) ?>
  <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
