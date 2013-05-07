<!DOCTYPE html> 
<html> 
	<head> 
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1>{$title}</h1>
	</div><!-- /header -->

	<div data-role="content">		       
	        <div id="container" style="width: 400px; height: 400px; margin: 0 auto"></canvas>
	</div><!-- /content -->

</div><!-- /page -->
    <script>
	var hx={$content->H};
	var ax={$content->A};
	var bx={$content->B};
	var cx={$content->C};
	var dx={$content->D};
	var sx={$content->S};
	var legends=['H','A','B','C','D','S'];
	var pname='{$content->name}';
    {literal}
$(function () {  
	var chart= new Highcharts.Chart({        
	    chart: { 
	    	type: 'area',
	    	renderTo:'container',
	    },
	    title: { text: 'Highcharts Polar Chart'},
	    	    
	    pane: {
	        startAngle: 0,
	        endAngle: 360
	    },
	    
	    xAxis: {
		    tickInterval: 60,
	        min: 0,
	        max: 360,
	        labels:{
	        	formatter:function(){
		        	return legends[ (this.value/60)%6 ] ;
	        	}
	        }
	    },	        
	    
	    yAxis: {
	        min: 0,
	        max:200
	    },	    
	    tooltip: {        
        	formatter: function () {
				return 	'<b>' + 
							this.series.name + '</b><br/>' +
    						legends[(this.x/60)] + ': ' + this.y ;                        
               }
         },
                    
	    plotOptions: {
	        series: {
	            pointStart: 0,
	            pointInterval: 60
	        },
	        column: {
	            pointPadding: 0,
	            groupPadding: 0
	        }
	    },
	    
	    series: [{
	        type: 'column',
	        name: pname,
	        data: [hx,ax,bx,cx,dx,sx],
	        pointPlacement: 'between'
	    }],
	});
});
    {/literal}
    </script>

</body>
</html>
