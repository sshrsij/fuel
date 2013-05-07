<h2>Listing Samples</h2>
<br>
<?php if ($samples): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Content</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($samples as $sample): ?>		<tr>

			<td><?php echo $sample->title; ?></td>
			<td><?php echo $sample->content; ?></td>
			<td>
				<?php echo Html::anchor('sample/view/'.$sample->id, 'View'); ?> |
				<?php echo Html::anchor('sample/edit/'.$sample->id, 'Edit'); ?> |
				<?php echo Html::anchor('sample/delete/'.$sample->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Samples.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('sample/create', 'Add new Sample', array('class' => 'btn btn-success')); ?>

</p>
