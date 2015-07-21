<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
	
		<?php
            NavBar::begin([
                'brandLabel' => '<img id="logo" alt="Brand" src="img/logo.png">',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-static-top my_nav',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    [
		      'label' => 'Главная', 'url' => ['/site/index']
		    ],
		    [
		      'label' => 'О нас',
		      'items' => [
			  [ 'label' => 'О компании', 'url' => ['site/aboutcompany'] ],
			  [ 'label' => 'Об авторе', 'url' => ['site/aboutavtor'] ],
			  [ 'label' => 'Ищем партнеров', 'url' => ['site/partners'] ],
		      ],
		    ],
		    [
		      'label' => 'Книги', 'url' => ['book/index'],
		    ],
		    [
		      'label' => 'Блог', 'url' => ['blog/index'],
		    ],
		    [
		      'label' => 'Программы',
		      'items' => [
			  [ 'label' => 'Счастливая жизнь', 'url' => 'programm/happy_life' ],
			  [ 'label' => 'Получай деньги за удовольствие', 'url' => 'programm/money_for_joy' ],
			  [ 'label' => 'Отношения полны щастья и любви', 'url' => 'programm/happy_and_love' ],
		      ],
		    ],
		    [
		      'label' => 'Наставничество', 'url' => ['site/teach'], 
		    ],
		    [
		      'label' => 'Персональная консультация', 'url' => ['static/skype'],
		    ],
		    [
		      'label' => 'Отзывы', 'url' => ['review/index'],
		    ],
                ],
            ]);
            NavBar::end();
        ?>
	
		<div class="container">
			 <?= $content ?>
		</div>
	</div>

<?php $this->endBody() ?>
<a href="#" class="scrollup">Наверх</a>
</body>
</html>
<?php $this->endPage() ?>
