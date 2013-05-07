<?php /* Smarty version Smarty-3.1.13, created on 2013-05-02 11:13:53
         compiled from "C:\Users\Public\Documents\XAMPP\htdocs\fuel\fuel\app\views\welcome\smarty.tpl" */ ?>
<?php /*%%SmartyHeaderCode:327625180bac2e240b5-43768776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a7e8c08008071d013de5badf76a344b30faea12' => 
    array (
      0 => 'C:\\Users\\Public\\Documents\\XAMPP\\htdocs\\fuel\\fuel\\app\\views\\welcome\\smarty.tpl',
      1 => 1367460828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327625180bac2e240b5-43768776',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5180bac3070527_69863177',
  'variables' => 
  array (
    'text' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5180bac3070527_69863177')) {function content_5180bac3070527_69863177($_smarty_tpl) {?><!DOCTYPE html> 
<html> 
	<head> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1>$title</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<p>Hello world</p>		
	<h1><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</h1>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>
<?php }} ?>