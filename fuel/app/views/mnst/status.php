<!DOCTYPE html> 
<html> 
    <head> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<script>
	    $(function() {
		$(document).on('expand', '.ui-collapsible', function(event) {
		    $(this).children().next().hide();
		    $(this).children().next().slideDown(200);
		});
		$(document).on('collapse', '.ui-collapsible', function(event) {
		    $(this).children().next().slideUp(200);
		});

		$.ajax({
		    type: "GET",
		    dataType: 'jsonp',
		    url: "http://ajax.googleapis.com/ajax/services/search/images?q=<?php echo $url; ?>&v=1.0",
		    success: function(msg) {
			console.log(msg);
			
			var src = msg.responseData.results[0].unescapedUrl;
			for (var idx = 0; idx < msg.responseData.results.length ; idx++) {
			    if (msg.responseData.results[idx].unescapedUrl.indexOf("blog") < 0) {
				src = msg.responseData.results[idx].unescapedUrl;
			    }
			}

			console.log(src);
			$("#pkimg").append($(document.createElement("img")).attr("src", src).attr('width', "120"));
		    }
		});

	    });
	</script>
    </head> 
    <body> 

	<div data-role="page">

	    <div data-role="header">
		<h1></h1>
	    </div><!-- /header -->
	    <div data-role="content">	
		<div data-role="collapsible-set">
		    <div data-role="collapsible"  data-content-theme="c">
			<h3>Fundamental</h3>			
			<div class='ui-collapsible'>		    
			    <div id='pkimg'></div>			    
			</div>
		    </div>
		    <div data-role="collapsible"  data-content-theme="c">
			<h3>Type</h3>			
			<div class='ui-collapsible'>aaaa</div>
		    </div>
		    <div data-role="collapsible"  data-content-theme="c">
			<h3>Skill</h3>			
			<div class='ui-collapsible'>aaaa</div>
		    </div>
		</div>
	    </div><!-- /content -->
	    <div data-role="footer">
		<h4></h4>
	    </div><!-- /footer -->
	</div><!-- /page -->
    </body>
</html>
