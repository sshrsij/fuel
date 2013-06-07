<!DOCTYPE html> 
<html> 
    <head> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<style>
	    #loading{
		display: none;
	    }
	</style>
    </head> 
    <body> 

	<div data-role="page">

	    <div data-role="header">
		<h1><?php echo $head; ?></h1>
	    </div><!-- /header -->

	    <div data-role="content">	
		<div data-role="collapsible-set">
		    <div data-role="collapsible"  data-content-theme="c">
			<h3>Status</h3>			
			<fieldset class="ui-grid-e ui-collapsible">
			    <div id="container" class="ui-block-a" style="width:200px; height: 200px;"></div>		    
			    <div class="ui-block-b ">
				<div id="pkimg"></div>
			    </div>
			    <div class="ui-block-c ">
				<div class="ui-bar ui-bar-e marginbar">
				    <?php
				    echo sprintf('<h2 id="pname">%s</h2>' . PHP_EOL, ($pkmn['name']));
				    echo sprintf('<p id="statusH">H:%s</p>' . PHP_EOL, $pkmn['H']);
				    echo sprintf('<p id="statusA">A:%s</p>' . PHP_EOL, $pkmn['A']);
				    echo sprintf('<p id="statusB">B:%s</p>' . PHP_EOL, $pkmn['B']);
				    echo sprintf('<p id="statusC">C:%s</p>' . PHP_EOL, $pkmn['C']);
				    echo sprintf('<p id="statusD">D:%s</p>' . PHP_EOL, $pkmn['D']);
				    echo sprintf('<p id="statusS">S:%s</p>' . PHP_EOL, $pkmn['S']);
				    ?>
				</div>
			    </div>
			    <div class="ui-block-d">
				<div class="ui-bar ui-bar-e marginbar">				
				    <h2>Type</h2>
				    <?php
				    echo sprintf('<p id="ptype1">type1:%s</p>' . PHP_EOL, ($pkmn['type1']));
				    echo sprintf('<p id="ptype2">type2:%s</p>' . PHP_EOL, ($pkmn['type2']));
				    ?>	
				</div>
			    </div>
			    <div class="ui-block-e">				
				<div class="ui-bar ui-bar-e marginbar">				    
				    <h2>Egg</h2>
				    <?php
				    echo sprintf('<p id="etype1">egg-type1:%s</p>' . PHP_EOL, trim($pkmn['egg1']));
				    echo sprintf('<p id="etype2">egg-type2:%s</p>' . PHP_EOL, trim($pkmn['egg2']));
				    ?>	
				</div>
			    </div>
			</fieldset>
		    </div>
		    <div data-role="collapsible"  data-content-theme="c"  id ="AbilityPane">
			<h3>Ability</h3>
			<fieldset class="ui-grid-c ui-collapsible">
			    <div class="ui-block-a">
				<div class="ui-bar ui-bar-e marginbar">
				    <h3 id="A1name"></h3>
				    <div id="A1text"></div>
				</div>
			    </div>	
			    <div class="ui-block-b">
				<div class="ui-bar ui-bar-e marginbar">
				    <h3 id="A2name"></h3>
				    <div id="A2text"></div>
				</div>
			    </div>	
			    <div class="ui-block-c">
				<div class="ui-bar ui-bar-e marginbar">
				    <h3 id="A3name"></h3>
				    <div id="A3text"></div>
				</div>
			    </div>	
			</fieldset>
		    </div>		    
		    <div data-role="collapsible"  data-content-theme="c" id="SkillPane">
			<h3>skills</h3>		
			<div class="ui-collapsible" id ="SkillData">			    
			</div>
		    </div>
		</div>
	    </div><!-- /content -->

	    <div data-role="footer">
		<h4>Page Footer</h4>
	    </div><!-- /footer -->
	</div><!-- /page -->
    </body>
    <script>
	var globals = {};
	globals.readAbility = true;
	globals.readSkill = true;

	$(function() {
	    var status;
<?php
echo sprintf(
	'status=[%s,%s,%s,%s,%s,%s];', $pkmn['H'], $pkmn['A'], $pkmn['B'], $pkmn['C'], $pkmn['D'], $pkmn['S']);
?>
	    var target = '#container';
	    var option = {legend: ['H', 'A', 'B', 'C', 'D', 'S']};
	    drawPolarchart(target, status, option);

	    $(document).on('expand', '.ui-collapsible', function(event) {
		$(this).children().next().hide();
		$(this).children().next().slideDown(200);
	    });
	    $(document).on('collapse', '.ui-collapsible', function(event) {
		$(this).children().next().slideUp(200);
	    });

	    $(document).on('expand', '#AbilityPane', function(ev) {
		OnExpandAbility();
	    });
	    $(document.body).on('expand', '#SkillPane', function(ev) {
		OnExpandSkill();
	    });

	    globals.readAbility = false;
	    globals.readSkill = false;

	    $.ajax({
		type: "GET",
		dataType: 'jsonp',
		url: "http://ajax.googleapis.com/ajax/services/search/images?q=<?php echo urlencode($pkmn['name']); ?>&v=1.0",
		success: function(msg) {
		    console.log(msg);

		    var src = msg.responseData.results[0].unescapedUrl;
		    for (var idx = 0; idx < msg.responseData.results.length; idx++) {
			if (msg.responseData.results[idx].unescapedUrl.indexOf("blog") < 0) {
			    src = msg.responseData.results[idx].unescapedUrl;
			}
		    }

		    console.log(src);
		    $("#pkimg").append($(document.createElement("img")).attr("src", src).attr('width', "200"));
		}
	    });
	});

	/*read ability*/
	function OnExpandAbility() {
	    if (globals.readAbility) {
		return false;
	    }
	    $.ajax({
		type: 'GET',
//		url: "/fuel/public/api/pkAbilities/" +<?php echo sprintf('%s', $pkmn['pid']); ?>,
		url: "/public/api/pkAbilities/" +<?php echo sprintf('%s', $pkmn['pid']); ?>,
		success: function(msg) {

		    $("#A1name").append("<p>" + msg.ability1.name + "</p>");

		    if (msg.ability1.text !== null) {
			$("#A1text").append("<p>" + msg.ability1.text + "</p>");
		    }
		    if (msg.ability2.name !== null) {
			$("#A2name").append("<p>" + msg.ability2.name + "</p>");
		    }
		    if (msg.ability2.text !== null) {
			$("#A2text").append("<p>" + msg.ability2.text + "</p>");
		    }
		    if (msg.ability3.name !== null) {
			$("#A3name").append("<p>" + msg.ability3.name + "</p>");
		    }
		    if (msg.ability3.text !== null) {
			$("#A3text").append("<p>" + msg.ability3.text + "</p>");
		    }
		    globals.readAbility = true;
		}
		,
		error: function(request, status, thrown) {
		    alert(request + "->" + status + " : " + thrown);
		    globals.readSkill = false;
		}
	    });
	    return true;
	}
	;

	/*read skills*/
	function OnExpandSkill() {
	    if (globals.readSkill) {
		return false;
	    }
	    $.ajax({
		type: 'GET',
//		url: "/fuel/public/api/pkSkills/" +<?php echo sprintf('%s', $pkmn['pid']); ?>,
		url: "/public/api/pkSkills/" +<?php echo sprintf('%s', $pkmn['pid']); ?>,
		success: function(msg) {
		    AppendSkillData(msg);
		    globals.readSkill = true;
		},
		error: function(request, status, thrown) {
		    alert(request + "->" + status + " : " + thrown);
		    globals.readSkill = false;
		}
	    });
	    return true;
	}
	;

	/*skill data*/
	function AppendSkillData(msg) {
	    $('#SkillData').children().remove();

	    var jqtable =
		    $('<table data-role="table" id="jqtable"  class="ui-responsive table-stroke table-stripe ui-table" data-mode="reflow"  />');
	    var header = $('<tr/>');

	    var ary = [
		"lv", "how", "Name",
		"type", "power", "hit", "pp",
		"skilltype", "touch", "range", "memo"];

	    ary.forEach(function(head) {
		header.append("<th>" + head + "</th>");
	    });
	    $('#SkillData').append(jqtable);
	    jqtable.append(header);


	    msg.forEach(function(data) {
		var elem = $('<tr/>');
		ary.forEach(function(head) {
		    if (head === "touch") {
			var tmpval = "-";
			if (data[head] === '0') {
			    tmpval = "touch";
			}
			elem.append("<td>" + tmpval + "</th>");
			return;
		    }

		    elem.append("<td>" + data[head] + "</th>");
		});
		jqtable.append(elem);
	    });

	}

    </script>
</html>
