<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
	
	<div class="col-lg-12">
		<div class="col-lg-12">
			<h3 class="text-center"><?= $model->title;?></h3>
		</div>
		<div class="col-lg-12">
			<img style="width: 200px; float: left;" class="img-responsive img-rounded" src="<?= $model->img_path;?>" />
			<?php
				$string = strip_tags($model->content);
				
				$string = mb_substr($string, 0, 300);
			?>
			<?= $string;?> ...
		</div>
		<div class="col-lg-12">
			<div class="col-lg-2 pull-left">
				<button type="button" class="btn btn-default btn-md">
					<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
				</button>
				<span class="counter" style="font-size: 16px;">1</span>
			</div>	
			<div class="col-lg-10">
				<a href="<?= Url::to(['blog/readmore', 'artic_id' => $model->id]); ?>" class="btn btn-success pull-right" role="button">Читать далее</a>
			</div>	
		</div>
		<div class="col-lg-12">
			<hr id="main_hr">
		</div>
	</div>