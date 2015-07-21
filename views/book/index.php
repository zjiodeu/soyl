<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Carousel;
use yii\widgets\ActiveForm;
use app\models\BooksSubcr;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';
?>

<?php $first = true; ?>
<?php foreach($books as $book):?>
	<?php if ( $first ): ?>
		<div class="col-lg-12">
			<hr id="main_hr">
		</div>
		<?php $first = false; ?>
	<?php endif;?>
	<div class="col-lg-12">
		<h3><?= $book->header;?></h3>
		<div class="text-center" style="width: 280px; float: left;">
			<img alt="" src="<?= $book->cover;?>" style="width: 280px; padding-right: 5px;" />
			<a class="btn btn-success" value="<?= $book->id;?>" onclick="newVal(this)" href="#want_book" data-toggle="modal" data-target="#want_book">Хочу эту книгу</a>
		</div>	
		<p class="text-justify">
			<?= $book->content;?>
		</p>
	
	</div>
	<div class="col-lg-12">
		<hr id="main_hr">
	</div>
<?php endforeach;?>


<div class="modal fade" id="want_book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Заявка на получение книги</h4>
			</div>
			<div class="modal-body">
			
				<?php $form = ActiveForm::begin(); ?>
				
				<?= $form->field($subcr, 'fio', [
					'template' => '
						{label}
						<div class="input-group input-group-lg">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							{input}
						</div>
						{error}',
				])->label('Ваше имя и фамилия') ?>
				
				<?= $form->field($subcr, 'email', [
					'template' => '
						{label}
						<div class="input-group input-group-lg">
							<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
							{input}
						</div>
						{error}',
				])->label('Ваш email') ?>
				
				<?= $form->field($subcr, 'sing', [
					'template' => '
						{label}
						<div class="input-group input-group-lg">
							<span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
							{input}
						</div>
						{error}',
				])->label('Хотели бы вы получить эту книгу в бумажном варианте с автографом Дениса Косташа?') ?>
				
				<?= $form->field($subcr, 'pay', [
					'template' => '
						{label}
						<div class="input-group input-group-lg">
							<span class="input-group-addon"><span class="glyphicon glyphicon-shopping-cart"></span></span>
							{input}
						</div>
						{error}',
				])->label('Сколько вы готовы за нее заплатить?') ?>
				
				<?= $form->field($subcr, 'hiddenId', [
					'template' => '{input}',
				])->hiddenInput()	?>
				
				<div class="form-group">
					<?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Отмена</button>
				</div>
				
				<?php ActiveForm::end(); ?>
				
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function newVal(t){
	var res = $(t).attr('value');	
	$('#bookssubcr-hiddenid').val(res); 
  	return false;
}
</script>