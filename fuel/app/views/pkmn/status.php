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
		<div data-role="collapsible-set">
		    <div data-role="collapsible"  data-content-theme="c">
			<h3>stat</h3>			
			<fieldset class="ui-grid-e ui-collapsible">
			    <div id="container" class="ui-block-a" style="width:200px; height: 200px;"></div>		    
			    <div class="ui-block-b ">
				<div class="ui-bar ui-bar-e marginbar">
				    <?php
				    echo sprintf('<h2 id="pname">%s</h2>' . PHP_EOL, urlencode($pkmn['name']));
				    echo sprintf('<p id="statusH">H:%s</p>' . PHP_EOL, $pkmn['H']);
				    echo sprintf('<p id="statusA">A:%s</p>' . PHP_EOL, $pkmn['A']);
				    echo sprintf('<p id="statusB">B:%s</p>' . PHP_EOL, $pkmn['B']);
				    echo sprintf('<p id="statusC">C:%s</p>' . PHP_EOL, $pkmn['C']);
				    echo sprintf('<p id="statusD">D:%s</p>' . PHP_EOL, $pkmn['D']);
				    echo sprintf('<p id="statusS">S:%s</p>' . PHP_EOL, $pkmn['S']);
				    ?>
				</div>
			    </div>
			    <div class="ui-block-c">
				<div class="ui-bar ui-bar-e marginbar">				
				    <h2>Type</h2>
				    <?php
				    echo sprintf('<p id="ptype1">type1:%s</p>' . PHP_EOL, $pkmn['type1']);
				    echo sprintf('<p id="ptype2">type2:%s</p>' . PHP_EOL, $pkmn['type2']);
				    ?>	
				</div>
			    </div>
			    <div class="ui-block-e">				
				<div class="ui-bar ui-bar-e marginbar">				    
				    <h2>Egg</h2>
				    <?php
				    echo sprintf('<p id="etype1">egg-type1:%s</p>' . PHP_EOL, $pkmn['egg1']);
				    echo sprintf('<p id="etype2">egg-type2:%s</p>' . PHP_EOL, $pkmn['egg2']);
				    ?>	
				</div>
			    </div>
			</fieldset>
		    </div>
		    <div data-role="collapsible"  data-content-theme="c">
			<h3>Ability</h3>		
			<fieldset class="ui-grid-c ui-collapsible">
			    <div class="ui-block-a">
				 <div class="ui-bar ui-bar-e marginbar">
				     <h3>Ability1</h3>
				</div>
			    </div>	
			    <div class="ui-block-b">
				<div class="ui-bar ui-bar-e marginbar">
				    <h3>Ability2</h3>
				</div>
			    </div>	
			    <div class="ui-block-c">
				<div class="ui-bar ui-bar-e marginbar">
				    <h3>Ability3</h3>
				</div>
			    </div>	
			</fieldset>
		    </div>		    
		    <div data-role="collapsible"  data-content-theme="c">
			<h3>skills</h3>		
			<p class="ui-collapsible">not implemented</p>
		    </div>
		</div>
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
