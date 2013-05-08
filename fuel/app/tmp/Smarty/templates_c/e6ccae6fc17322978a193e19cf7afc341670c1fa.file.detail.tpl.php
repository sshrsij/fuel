<?php /* Smarty version Smarty-3.1.13, created on 2013-05-08 12:01:56
         compiled from "C:\Users\Public\Documents\XAMPP\htdocs\fuel\fuel\app\views\mnst\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:237215188c998e5e9c5-49822841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6ccae6fc17322978a193e19cf7afc341670c1fa' => 
    array (
      0 => 'C:\\Users\\Public\\Documents\\XAMPP\\htdocs\\fuel\\fuel\\app\\views\\mnst\\detail.tpl',
      1 => 1367982110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '237215188c998e5e9c5-49822841',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5188c998eeb5c3_64799457',
  'variables' => 
  array (
    'title' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5188c998eeb5c3_64799457')) {function content_5188c998eeb5c3_64799457($_smarty_tpl) {?><!DOCTYPE html> 
<html> 
	<head> 
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
	</div><!-- /header -->

	<div data-role="content">		       
	        <div id="container" style="width: 300px; height: 300px; "></div>
	</div><!-- /content -->

</div><!-- /page -->
    <script>
	var hx=<?php echo $_smarty_tpl->tpl_vars['content']->value->H;?>
;
	var ax=<?php echo $_smarty_tpl->tpl_vars['content']->value->A;?>
;
	var bx=<?php echo $_smarty_tpl->tpl_vars['content']->value->B;?>
;
	var cx=<?php echo $_smarty_tpl->tpl_vars['content']->value->C;?>
;
	var dx=<?php echo $_smarty_tpl->tpl_vars['content']->value->D;?>
;
	var sx=<?php echo $_smarty_tpl->tpl_vars['content']->value->S;?>
;
	
	var pname='No<?php echo $_smarty_tpl->tpl_vars['content']->value->id;?>
';
    	 
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
    
    </script>

</body>
</html>
<?php }} ?>