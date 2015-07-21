<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\bootstrap\Carousel;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Categories;

$this->title = 'My Yii Application';
?>

<div class="col-lg-12 text-center">
	<h1>Добро пожаловать!</h1>
	<iframe allowfullscreen="" frameborder="0" height="315" src="https://www.youtube.com/embed/Qod03jKbe6Q" width="560"></iframe>
</div>

<div class="col-lg-12">
	<?php $first = true; ?>
	<?php foreach($articles as $article):?>
		
		<?php if ( $first ): ?>
			<div class="col-lg-12">
				<hr id="main_hr">
			</div>
			<?php $first = false; ?>
		<?php endif;?>
		
		<div class="col-lg-12">
			<h4 class="text-center"><b><?= $article->title;?></b></h4>
		</div>
		<div class="col-lg-12">
			<img alt="" src="<?= $article->img_path;?>" style="width: 200px; float: left; padding-right: 5px;" />
			<p class="text-justify">
				<?php
					$string = strip_tags($article->content);
					$string = str_replace("&nbsp;",' ',$string);
					$string = mb_substr($string, 0, 1000);
					echo $string."...";
				?>
			</p>
		</div>
		<div class="col-lg-12">
			<a class="pull-right" href="<?= Url::to(['blog/readmore', 'artic_id' => $article->id]); ?>">Читать далее >></a>
		</div>
		<div class="col-lg-12">
			<hr id="main_hr">
		</div>
	<?php endforeach;?>
</div>

<!-- test -->
<div class="col-lg-12">
	<div class="subscribe_form-big">
		<h2>Получите бесплатный доступ!</h2>

		<p>
			<span style="font-size:16px;">Есть много полезной информации, которую получают только наши подписчики.<br />
			Получите бесплатный доступ к нашему самому ценному опыту. Если вы станете нашим подписчиком прямо сейчас, то получите, причем&nbsp; абсолютно бесплатно, уникальный подарок: книгу &quot;21 шаг к счастливой жизни.&quot; Дениса Косташа</span>
		</p>

		<form class="form-inline" role="form">
			<div class="form-group"><label for="subscribe_name">Введите ваше имя:</label> <input class="form-control" id="subscribe_name" placeholder="Иванов Иван" type="text" /></div>

			<div class="form-group"><label for="subscribe_mail">Введите ваш e-mail:</label> <input class="form-control" id="subscribe_mail" placeholder="ivanov@gmail.com" type="email" /></div>
		</form>

		<div class="text-center"><a class="btn btn-lg btn-success" href="#subscribe_free_shell">Получить доступ</a></div>

		<div class="text-center infoblock"><span>42217</span> человека уже подписались</div>
	</div>
     
</div>
