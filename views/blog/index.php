<?php
	use yii\widgets\ListView;
?>
<?php 
	if(isset($articles)){	
		echo ListView::widget( [
			'dataProvider' => $articles,
			'itemView' => '_item',
			'summary' => '',
		] );
	}
?>