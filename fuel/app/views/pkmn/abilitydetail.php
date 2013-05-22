<!DOCTYPE html> 
<html> 
    <head> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
    </head> 
    <body> 

	<div data-role="page">

	    <div data-role="header">
		<h1><?php echo $head; ?></h1>
	    </div><!-- /header -->

	    <div data-role="content">	
	    </div><!-- /content -->

	    <div data-role="footer">
		<h4>Page Footer</h4>
	    </div><!-- /footer -->
	</div><!-- /page -->
    </body>
    <script>
	$(function() {
	    var status;
<?php
echo sprintf(
	'status=[%s,%s,%s,%s,%s,%s];', $pkmn['H'], $pkmn['A'], $pkmn['B'], $pkmn['C'], $pkmn['D'], $pkmn['S']);
?>
	    var target = '#container';
	    var option = {legend: ['H', 'A', 'B', 'C', 'D', 'S'], };
	    drawPolarchart(target, status, option);
	    /*アコーディオンを気持ちよく*/
	    $(document).on('expand', '.ui-collapsible', function() {
		$(this).children().next().hide();
		$(this).children().next().slideDown(200);
	    })
	    $(document).on('collapse', '.ui-collapsible', function() {
		$(this).children().next().slideUp(200);
	    });

	});

    </script>
</html>
