<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>

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
