<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="text/javascript">
	</script>
</head>
<body>
	<div data-role="page">
		<header data-role="header">
			<h1>List</h1>
		</header>
		<div data-role="content">
			<table data-role="table" id="table-column-toggle"
				data-mode="columntoggle" class="ui-responsive table-stroke">
				<thead>
					<tr class="ui-bar-d">
						<th>no</th>
						<th data-priority="1">H</th>
						<th data-priority="2">A</th>
						<th data-priority="3">B</th>
						<th data-priority="4">C</th>
						<th data-priority="5">D</th>
						<th data-priority="6">S</th>
					</tr>
				</thead>
				<tbody>
					<?php					
					$idx=0;
					for ($idx=0;$idx<10;$idx++){
	        		echo '<tr>';
	        		echo sprintf("<td>%s</td>",'a');
	        		echo sprintf("<td>%s</td>",$idx);
	        		echo sprintf("<td>%s</td>",$idx);
	        		echo sprintf("<td>%s</td>",$idx);
	        		echo sprintf("<td>%s</td>",$idx);
	        		echo sprintf("<td>%s</td>",$idx);
	        		echo sprintf("<td>%s</td>",$idx);
	        		echo '</tr>';
	        	}
	        	?>
				</tbody>
			</table>
		</div>
		<footer data-role="footer">
			<h1></h1>
		</footer>
	</div>
</body>
</html>
