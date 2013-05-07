<h2>Editing Sample</h2>
<br>

<?php echo render('sample/_form'); ?>
<p>
	<?php echo Html::anchor('sample/view/'.$sample->id, 'View'); ?> |
	<?php echo Html::anchor('sample', 'Back'); ?></p>
