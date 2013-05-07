<h2><a href="/fuel/public/monkey/test/">Listing Inquiries</a></h2>
<br>
<?php if ($inquiry): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>name</th>
			<th>title</th>
			<th>company</th>			
			<th>customer</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($inquiry as $inq): ?>		<tr>
<?php
 $owner=$inq->owner;
 $cc=$inq->customercompany;
?>
			<td><a href="/fuel/public/monkey/name/<?php echo $owner;?>"> <?php echo $owner;?> </a></td>
			<td><?php echo $inq->title; ?></td>
			<td><a href="/fuel/public/monkey/company/<?php echo $cc;?>"> <?php echo $cc;?> </a></td>
			<td><?php echo $inq->customerperson; ?></td>
			<td>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Monkeys.</p>

<?php endif; ?><p>

</p>
