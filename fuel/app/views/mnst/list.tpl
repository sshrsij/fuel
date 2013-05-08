<!DOCTYPE html> 
<html> 
	<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1>{$title}</h1>
	</div><!-- /header -->

	<div data-role="content">	
	<table data-role="table" id=status" data-mode="columntoggle" data-column-popup-theme="e">
	<thead>
		<tr>
			<th>name</th>
			<th>H</th>	<th>A</th>	
			<th>B</th>	<th>C</th>	
			<th>D</th>	<th>S</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$content item=item}
		<tr>
		<td>
		</td>
		<td>{$item->H}</td><td>{$item->A}</td><td>{$item->B}</td>
		<td>{$item->C}</td><td>{$item->D}</td><td>{$item->S}</td>
		</tr>
		{/foreach}
	</tbody>
	</table>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>
