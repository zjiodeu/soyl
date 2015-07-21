<div class="row">
	<div class="col-lg-12">
		<h3 class="text-center"><?= $article->title;?></h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12" style="background: #f4f4f4;">
		<img class="img-responsive img-rounded center-block" src="<?= $article->img_path;?>" />
	</div>
</div>
<div class="row">
	<div class="col-lg-12" style="background: #f4f4f4;">
		<?= $article->content;?>
	</div>
</div>