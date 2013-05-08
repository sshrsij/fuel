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
	        <div id="container" style="width: 300px; height: 300px; "></div>
	</div><!-- /content -->

</div><!-- /page -->
    <script>
	var hx={$content->H};
	var ax={$content->A};
	var bx={$content->B};
	var cx={$content->C};
	var dx={$content->D};
	var sx={$content->S};
	
	var pname='No{$content->id}';
    {literal}	 
    var legends=['H','B','A','S','C','D'];
    var dataset=[hx,bx,ax,sx,cx,dx];
    
$(function () {  
	var chart= new Highcharts.Chart({        
	    chart: { 
		    polar:true,
	    	renderTo:'container',
	    },
        legend: { enabled: false},
	    title: { text: pname},	    	    
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
		        	return legends[(this.value/60)];
	        	}
	        }
	    },	        
	    
	    yAxis: {
		    tickInterval:50,
	        min: 0,
	        max:150,
		 },	    
	    tooltip: {        
        	formatter: function () {
				return 	'<b>' + 
							this.series.name + '</b><br/>' +
    						legends[(((this.x +30+360)%360) /60)] + ': ' + this.y ;                        
               }
         },
                    
	    plotOptions: {
	        series: {
	            pointStart: -30,
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
	        data: dataset,
	        pointPlacement: 'between'
	    }],
	});
});
    {/literal}
    </script>

</body>
</html>
