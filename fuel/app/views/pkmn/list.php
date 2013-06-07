<!DOCTYPE html> 
<html> 
    <head> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<?php

	function rowElement($data, $column) {
	    if ($column === "no" || $column === "name") {
		return linktoOne($data[$column], $data["pid"]);
	    } else if ($column === 'type1') {
		return linktoType($data[$column], $data['t1id']);
	    } else if ($column === 'type2') {
		return linktoType($data[$column], $data['t2id']);
	    } else if ($column === 'egg1') {
		return linktoEgg($data[$column], $data['e1id']);
	    } else if ($column === 'egg2') {
		return linktoEgg($data[$column], $data['e2id']);
	    } else if ($column === 'ability1') {
		return linktoAbility($data[$column], $data['a1id']);
	    } else if ($column === 'ability2') {
		return linktoAbility($data[$column], $data['a2id']);
	    } else if ($column === 'ability3') {
		return linktoAbility($data[$column], $data['a3id']);
	    }
	    return '<td>' . $data[$column] . '</td>';
	}

	function linktoType($value, $no) {
	    return sprintf('<td><a href="%s/list?type=%d">%s</a></td>', $this->rootURL, $no, $value);
	}

	function linktoEgg($value, $no) {
	    return sprintf('<td><a href="%s/list?egg=%d">%s</a></td>', $this->rootURL, $no, $value);
	}

	function linktoAbility($value, $no) {
	    return sprintf('<td><a href="%s/list?ability=%d">%s</a></td>', $this->rootURL, $no, $value);
	}

	/**
	 * 個体へのステータスページへ遷移
	 * @param type $value
	 * @param type $no
	 * @return type
	 */
	function linktoOne($value, $no) {
	    return sprintf('<td><a href="%s/status/%d">%s</a></td>', $this->rootURL, $no, $value);
	}
	?>
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
			$tmpcnt = 0;
			foreach ($header as $hd) {
			    echo sprintf('<th data-priority="%d">%s</th>', ++$tmpcnt, $hd);
			}
			?>
		    </tr>

		</thead>
		<tbody>
		    <?php
		    foreach ($pklist as $value) {
			echo '<tr>';
			foreach ($header as $hd) {
			    echo rowElement($value, $hd);
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