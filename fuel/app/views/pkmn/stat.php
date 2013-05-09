<html>
<head>
<style >
<!--
.input{
	ime-mode: disabled;
	width:60px;
	height:28px;
}
-->
</style>
<script>
function hval(eh,ih,eh,lv)
{
	return (((rh*2+ih%32+(eh%256)/4) * lv / 100) |0) +10+ lv;
}
function sval(rv,iv,ev,lv,bv)
{
	var val=( rv*2+iv%32+(ev%256)/4)*lv/100;
	return ((val+5)*1.1) |0;
}
function textchanged()
{

	$("#resh").val( hval(
				$("#rh").val(),
				$("#ih").val(),
				$("#eh").val(),
				50));
	$("#resa").val( sval( 
			$("#ra").val(),
			$("#ia").val(),
			$("#ea").val(),
			50,1));
	$("#resb").val( sval( 
			$("#rb").val(),
			$("#ib").val(),
			$("#eb").val(),
			50,1));
	$("#resc").val( sval( 
			$("#rc").val(),
			$("#ic").val(),
			$("#ec").val(),
			50,1));
	$("#resd").val( sval( 
			$("#rd").val(),
			$("#id").val(),
			$("#ed").val(),
			50,1));
	$("#ress").val( sval( 
			$("#rs").val(),
			$("#is").val(),
			$("#es").val(),
			50,1));
	
}
</script>
<script>
$(function () 
{	
	 $("#rh").val(<?php echo $content->H;?>);
	 $("#ra").val(<?php echo $content->A;?>);
	 $("#rb").val(<?php echo $content->B;?>);
	 $("#rc").val(<?php echo $content->C;?>);
	 $("#rd").val(<?php echo $content->D;?>);
	 $("#rs").val(<?php echo $content->S;?>);
	 textchanged();	 
});
</script>

</head>
<body>
<form id="adjustForm">
<table>
<th><td>Rv</td><td>Iv</td><td>Ev</td><td>result</td></th>
 <tr> 
 	<td><p>H</p></td>
 	<td><input id="rh" type="text" class ="input" maxlength="3" readonly="readonly"/></td>
 	<td><input id="ih" type="text" class ="input" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="eh" type="text" class ="input" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="resh" type="text" class ="input" maxlength="3" /></td>
 </tr>
 <tr> 
 	<td><p>A</p></td>
 	<td><input id="ra" type="text" class ="input" maxlength="3" readonly="readonly"/></td>
 	<td><input id="ia" type="text" class ="input" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="ea" type="text" class ="input" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="resa" type="text" class ="input" maxlength="3" /></td>
 </tr>
  <tr> 
 	<td><p>B</p></td>
 	<td><input id="rb" type="text" class ="input" maxlength="3" readonly="readonly"/></td>
 	<td><input id="ib" type="text" class ="input" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="eb" type="text" class ="input" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="resb" type="text" class ="input" maxlength="3" /></td>
 </tr>
  <tr> 
 	<td><p>C</p></td>
 	<td><input id="rc" type="text" class ="input" maxlength="3" readonly="readonly"/></td>
 	<td><input id="ic" type="text" class ="input" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="ec" type="text" class ="input" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="resc" type="text" class ="input" maxlength="3" /></td>
 </tr>
  <tr> 
 	<td><p>D</p></td>
 	<td><input id="rd" type="text" class ="input" maxlength="3" readonly="readonly"/></td>
 	<td><input id="id" type="text" class ="input" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="ed" type="text" class ="input" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="resd" type="text" class ="input" maxlength="3" /></td>
 </tr>
  <tr> 
 	<td><p>S</p></td>
 	<td><input id="rs" type="text" class ="input" maxlength="3" readonly="readonly" /></td>
 	<td><input id="is" type="text" class ="input" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="es" type="text" class ="input" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="ress" type="text" class ="input" maxlength="3" /></td>
 </tr>
 </table>
 
</form>
</body>
</html>