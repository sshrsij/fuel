<h2>Listing Monkeys</h2>
<br>
<?php if ($monkeys): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Desc</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($monkeys as $monkey): ?>		<tr>

			<td><?php echo $monkey->name; ?></td>
			<td><?php echo $monkey->desc; ?></td>
			<td>
				<?php echo Html::anchor('monkey/view/'.$monkey->id, 'View'); ?> |
				<?php echo Html::anchor('monkey/edit/'.$monkey->id, 'Edit'); ?> |
				<?php echo Html::anchor('monkey/delete/'.$monkey->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Monkeys.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('monkey/create', 'Add new Monkey', array('class' => 'btn btn-success')); ?>

</p>
