<h2>Viewing #<?php echo $sample->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $sample->title; ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $sample->content; ?></p>

<?php echo Html::anchor('sample/edit/'.$sample->id, 'Edit'); ?> |
<?php echo Html::anchor('sample', 'Back'); ?>