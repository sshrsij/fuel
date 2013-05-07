<?php /* Smarty version Smarty-3.1.13, created on 2013-05-07 20:33:21
         compiled from "C:\Users\Public\Documents\XAMPP\htdocs\fuel\fuel\app\views\mnst\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:237215188c998e5e9c5-49822841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6ccae6fc17322978a193e19cf7afc341670c1fa' => 
    array (
      0 => 'C:\\Users\\Public\\Documents\\XAMPP\\htdocs\\fuel\\fuel\\app\\views\\mnst\\detail.tpl',
      1 => 1367926398,
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
	        <div id="container" style="width: 400px; height: 400px; margin: 0 auto"></canvas>
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
	var legends=['H','A','B','C','D','S'];
	var pname='<?php echo $_smarty_tpl->tpl_vars['content']->value->name;?>
';
    
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
    
    </script>

</body>
</html>
<?php }} ?>