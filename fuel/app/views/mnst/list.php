<!DOCTYPE html> 
<html> 
    <head> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<style>
<?php echo $css; ?>	    
	</style>
	<script>
	    $(function() {
<?php echo $js; ?>
	    });
	</script>
    </head> 
    <body> 

	<div data-role="page">

	    <div data-role="header">
		<h1><?php echo $head; ?></h1>
	    </div><!-- /header -->
	    <div data-role="content">	
		<table data-role="table" id="jqtable" 
		       class="ui-responsive table-stroke table-stripe ui-table " data-mode="reflow"  />		
		<thead>
		    <tr>
			<?php
			/* header出力 */
			$header = array("no", "name", "type1", "type2", "ability1", "ability2", "ability3", "egg1", "egg2");
			$tmpcnt=0;
			foreach ($header as $hd) {
			    echo sprintf('<th data-priority="%d">%s</th>',++$tmpcnt,$hd);
			}
			?>
		    </tr>

		</thead>
		<tbody>
		    <?php
		    foreach ($pklist as $value) {
			echo '<tr>';
			foreach ($header as $hd) {
			    echo $rowfunc($value, $hd);
			}
			echo '</tr>';
		    }
		    ?>
		    <tr>
		    </tr>

		</tbody>
		</table>
	    </div><!-- /content -->
	    <div data-role="footer">
		<?php
		\Fuel\Core\Pagination::set_config($config);
		echo \Fuel\Core\Pagination::create_links();
		?>
	    </div><!-- /footer -->
	</div><!-- /page -->
    </body>
</html>