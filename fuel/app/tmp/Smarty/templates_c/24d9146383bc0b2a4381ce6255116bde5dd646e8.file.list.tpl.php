<?php /* Smarty version Smarty-3.1.13, created on 2013-05-07 18:20:50
         compiled from "C:\Users\Public\Documents\XAMPP\htdocs\fuel\fuel\app\views\mnst\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:263845188ba74071529-08440433%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24d9146383bc0b2a4381ce6255116bde5dd646e8' => 
    array (
      0 => 'C:\\Users\\Public\\Documents\\XAMPP\\htdocs\\fuel\\fuel\\app\\views\\mnst\\list.tpl',
      1 => 1367918445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '263845188ba74071529-08440433',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5188ba74268836_93028357',
  'variables' => 
  array (
    'title' => 0,
    'content' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5188ba74268836_93028357')) {function content_5188ba74268836_93028357($_smarty_tpl) {?><!DOCTYPE html> 
<html> 
	<head> 
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
	<table data-role="table" id=status" data-mode="columntoggle" data-column-popup-theme="e">
	<thead>
		<tr>
			<th>name</th>
			<th>H</th>	<th>A</th>	
			<th>B</th>	<th>C</th>	
			<th>D</th>	<th>S</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['content']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<tr><td><?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value->H;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value->A;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value->B;?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value->C;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value->D;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value->S;?>
</td>
		</tr>
		<?php } ?>
	</tbody>
	</table>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>
<?php }} ?>