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
<script>/*内部メソッド群*/
/*H実数値*/
function hval(rh,ih,eh,lv)
{
	return (((rh*2+ih%32+(eh%256)/4) * lv / 100) |0) +10+ lv;
}
/*ABCDS実数値*/
function sval(rv,iv,ev,lv,bv)
{
	var val=( rv*2+iv%32+(ev%256)/4)*lv/100;
	return ((val+5)*bv) |0;
}
/*テキスト変更時*/
function textchanged()
{

	/*値の正規化*/
	$(".iv").each(function(){
		var oldval=$(this).val();
		if(! oldval)	{oldval=31;}
		$(this).val((oldval%32));					
	});
	$(".ev").each(function(){
		var oldval=$(this).val();
		if(! oldval)	{oldval=0;}
		$(this).val((oldval%256));					
	});
	/*personality反映*/
	var pr=[1,1,1,1,1];
	if(glovals['s_persona']){
		pr=[
			glovals['s_persona'].A/10.0,
			glovals['s_persona'].B/10.0,
			glovals['s_persona'].C/10.0,
			glovals['s_persona'].D/10.0,
			glovals['s_persona'].S/10.0];
	}
	/*再計算*/
	$("#resh").val( hval(	$("#rh").val(),$("#ih").val(),$("#eh").val(),50));
	$("#resa").val( sval(	$("#ra").val(),$("#ia").val(),$("#ea").val(),50, pr[0]));
	$("#resb").val( sval(	$("#rb").val(),$("#ib").val(),$("#eb").val(),50, pr[1]));
	$("#resc").val( sval(	$("#rc").val(),$("#ic").val(),$("#ec").val(),50, pr[2]));
	$("#resd").val( sval(	$("#rd").val(),$("#id").val(),$("#ed").val(),50, pr[3]));
	$("#ress").val( sval(	$("#rs").val(),$("#is").val(),$("#es").val(),50, pr[4]));
}

/*personality選択時*/
function clickPersonal(no)
{
	/*選択値を反映*/
	glovals['s_persona']=glovals['personality'][no];
	/*表示反映*/
	var pr=		[	glovals['s_persona'].A,
	    				glovals['s_persona'].B,
	    				glovals['s_persona'].C,
	    				glovals['s_persona'].D,
	    				glovals['s_persona'].S ];

	/*表示色変更*/
	var cnt=0;
	$(".legend").each(function(){
		if(pr[cnt]>10){
			$(this).css({'color':'#F00','text-decoration': 'underline'});			
		}
		else if(pr[cnt]<10){
			$(this).css({'color':'#00F','text-decoration': 'underline'});			
		}
		else{
			$(this).css({'color':'#000','text-decoration': 'none'});
		}
		++cnt;
	});
	
	textchanged();
}

</script>
<script>/**広域変数、起動時処理*/
var glovals={
		'personality':[],
		's_persona':null,
};


/*起動時*/
$(function () {	

	 $("#rh").val(<?php echo $content->H;?>);
	 $("#ra").val(<?php echo $content->A;?>);
	 $("#rb").val(<?php echo $content->B;?>);
	 $("#rc").val(<?php echo $content->C;?>);
	 $("#rd").val(<?php echo $content->D;?>);
	 $("#rs").val(<?php echo $content->S;?>);

	 /*personality読み込み*/
	 $.ajax({
		 type:'GET',
		 url:'/fuel/public/personality/all',
		 datatype:'json',
		 success:function(msg){
			 glovals['personality']=msg.val;
			 var xcnt=0;
			 jQuery.each(msg.val,function(){				 
				 $("#personal").append(
						 '<option value="'+this.id+'"'+
						 ' onclick="clickPersonal('+this.id+')">'+
						 this.name+"</option>");
			 });
		},
	 });
	 
	 /*値の反映*/
	 textchanged();	 
});
</script>

</head>
<body>
<form id="adjustForm">
<table>
<th><td>Rv</td><td>Iv</td><td>Ev</td><td>result</td></th>
 <tr> 
 	<td><p id="Lh" class="">H</p></td>
 	<td><input id="rh" type="text" class ="input" maxlength="3" readonly="readonly"/></td>
 	<td><input id="ih" type="text" class ="input iv" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="eh" type="text" class ="input ev" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="resh" type="text" class ="input resv" maxlength="3" /></td>
 </tr>
 <tr> 
 	<td><p id="La" class="legend">A</p></td>
 	<td><input id="ra" type="text" class ="input" maxlength="3" readonly="readonly"/></td>
 	<td><input id="ia" type="text" class ="input iv" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="ea" type="text" class ="input ev" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="resa" type="text" class ="input resv" maxlength="3" /></td>
 </tr>
  <tr> 
 	<td><p id="Lb" class="legend">B</p></td>
 	<td><input id="rb" type="text" class ="input" maxlength="3" readonly="readonly"/></td>
 	<td><input id="ib" type="text" class ="input iv" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="eb" type="text" class ="input ev" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="resb" type="text" class ="input resv" maxlength="3" /></td>
 </tr>
  <tr> 
 	<td><p id="Lc" class="legend">C</p></td>
 	<td><input id="rc" type="text" class ="input" maxlength="3" readonly="readonly"/></td>
 	<td><input id="ic" type="text" class ="input iv" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="ec" type="text" class ="input ev" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="resc" type="text" class ="input resv" maxlength="3" /></td>
 </tr>
  <tr> 
 	<td><p id="Ld" class="legend">D</p></td>
 	<td><input id="rd" type="text" class ="input" maxlength="3" readonly="readonly"/></td>
 	<td><input id="id" type="text" class ="input iv" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="ed" type="text" class ="input ev" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="resd" type="text" class ="input resv" maxlength="3" /></td>
 </tr>
  <tr> 
 	<td><p id="Ls" class="legend">S</p></td>
 	<td><input id="rs" type="text" class ="input" maxlength="3" readonly="readonly" /></td>
 	<td><input id="is" type="text" class ="input iv" maxlength="2" onchange="textchanged()"/></td>
 	<td><input id="es" type="text" class ="input ev" maxlength="3"onchange="textchanged()" /></td>
 	<td><input id="ress" type="text" class ="input resv" maxlength="3" /></td>
 </tr>
 </table>
 	<input type="text" id='nametext' value="""/>
	<input type="button" id='add' value="Add" onclick="addStatus();"/>		
	<select id="personal" size="3"></select>
</form>
</body>
</html>