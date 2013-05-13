<html>
<style>
<!--
input{
	vertical-align:middle;
}
#dleft{
	float:left;
	width:15em;

}
#dcenter{
	float:left;
	width:20em;
	border-style:solid;
	border-width:0px 0px 0px 1px; 	
	padding-left:1em;
}
#dright{
	float:left;
	width:20em;
	border-style:solid;
	border-width:0px 0px 0px 1px; 	
}
#selection {
	float: left;
}
#s_adjusted{
	width: 12em;
}
#s_pkmn {
	width: 8em;
}

#s_personal {
	width: 6em;
}

#container {
	width: 300px;
	height: 500px;
}

.rowhead {
	width: 3em;
	margin-top:-5px;
}
.rtext{
width: 3em;
}
.itext {
	width: 3em;
}

.etext {
	width: 4em;
}
-->
</style>
<script>/*広域変数*/
var globals={
		list:[],
		personal:[],
		tmp:[0,0,0,0,0,0],
};
</script>
<script> //class
var adjusted=function(){
	this.races	=	[0,0,0,0,0,0];
	this.indis	=	[0,0,0,0,0,0];
	this.efforts=	[0,0,0,0,0,0];
	this.lv=50;
	this.pkmnID=1;
	this.skillID=1;
}
/*H実数値*/
function hval(rh,ih,eh,lv)
{
	if(rh<=1){return 1;}
	return (((rh*2+ih%32+(eh%256)/4) * lv / 100) |0) +10+ lv;
}
/*ABCDS実数値*/
function sval(rv,iv,ev,lv,bv)
{
	var val=( rv*2+iv%32+(ev%256)/4)*lv/100;
	return ((val+5)*bv) |0;
}
</script>

<script>//pkmn selected
function updatePkmn(pkmn){
	$("#rH").val(pkmn.H);		
	$("#rA").val(pkmn.A);		
	$("#rB").val(pkmn.B);		
	$("#rC").val(pkmn.C);		
	$("#rD").val(pkmn.D);		
	$("#rS").val(pkmn.S);	
	updateTable();
}
function updateTable(){
	var ary=['H','A','B','C','D','S'];
	$.each(ary,function(){
		var tmp;
		/*iv*/
		tmp=$("#i"+this).val();
		if(! tmp){tmp=31;}
		$("#i"+this).val( tmp%32);
		/*ev*/		
		tmp=$("#e"+this).val();
		if(! tmp){tmp=0;}
		$("#e"+this).val( tmp%256);
	});

	var pr=[1,1,1,1,1];
	var count=-1;
	$("#resH").html( hval(	$("#rH").val(),$("#iH").val(),$("#eH").val(),50));
	$.each(ary,function(){
		if(count==-1)
		{
			++count;
			return true;
		}
		$("#res"+this).html(
				sval(	$("#r"+this).val(), 	$("#i"+this).val(), 	$("#e"+this).val(), 50,	pr[count])
		);
		count++;
	});

	globals["tmp"]=[
	            	parseInt($("#resH").html()),   	            			
	    	        parseInt($("#resA").html()),
	    	        parseInt($("#resB").html()),
	    	        parseInt($("#resC").html()),
	    	        parseInt($("#resD").html()),
         	        parseInt($("#resS").html())];
	var highchart=$('#container').highcharts();

	highchart.series[0].setData(globals["tmp"], true);	
	highchart.hideLoading();
}
function onclickedButton(target,value)
{
	$.each(
			document.getElementsByName("rowhead"),
			function(){
				if(! this.checked){return true;}
				$("#"+target+this.id.charAt(5)).val(value);
				updateTable();
				return false;
		});

}
</script>

<script> //event method
function onSelectedPkmn(no)
{
	 $.ajax({
		 type:'GET',
		 url:'/fuel/public/api/pkmnbyid/'+no,
		 datatype:'json',
		 success:function(msg){
 			 updatePkmn(msg.val);
		 },
		 error:function(msg){
			 alert(msg);
		 },
	});
}
</script>

<script>//chart
function chart(){
var legends=['H','A','B','C','D','S'];

var dataset=[100,136,80,90,80,80];
var pname='sample';
 new Highcharts.Chart({        
    chart: { 
        type:'bar',
        inverted:true,
    	renderTo:'container',
    },
    legend: { enabled: false},
    title: { text: pname},	    	    
    xAxis:{ 	categories:legends},
    yAxis:{
        min:0,
        max:240
    },
    series: [{
        type: 'bar',
        name: pname,
        data: dataset,
    }],
});
}
</script>


<script>//起動時
$(function(){
	initPkmnlist();
	initPersonalitylist();
	chart();
});
/*初期化 pkmnリスト*/
function initPkmnlist()
{
	 $.ajax({
		 type:'GET',
		 url:'/fuel/public/api/pkmnall',
		 datatype:'json',
		 success:function(msg){
			$.each(msg.val , function(){
				 var opt=$('<option onclick="onSelectedPkmn('+this.id+')">'+this.name+'</option>');
				 opt.attr("value",this.id);
				 $("#s_pkmn").append(opt);
			 });
		 },
		 error:function(msg){
			 alert(msg);
		 },
	});
}

/*初期化 personal*/
function initPersonalitylist(){
	$.ajax({
		 type:'GET',
		 url:'/fuel/public/api/personalityall',
		 datatype:'json',
		 success:function(msg){
			$.each(msg.val , function(){
				 var opt=$("<option>"+this.name+"</option>");
				 opt.attr("value",this.id);
				 $("#s_personal").append(opt);
			 });
		 },
		 error:function(msg){
			 alert(msg);
		 },
	});
}
</script>


<body>
	<form id="selection">
		<div id="dleft">
			<select id="s_pkmn" size="2"></select><br /> <select id="s_adjusted" size="4"></select>
		</div>
		<div id="dcenter">
			<div id="rb_skill" style="display: none;">
				<input type="radio" name="skill" id="skill1" value="1" /> <input
					type="radio" name="skill" id="skill2" value="2" /> <input
					type="radio" name="skill" id="skill3" value="3" />
			</div>
			<select id="s_personal" size="2"></select><br />
			<div id="easyinput">
				<input type="button" value="Iv->0" onclick="onclickedButton('i',0);"/>
				<input type="button" value="Iv->31" onclick="onclickedButton('i',31);" />
				<input type="button" value="Ev->0" onclick="onclickedButton('e',0);" />
				<input type="button" value="Ev->252" onclick="onclickedButton('e',252);"/>
			</div>
			<table>
				<th>
				
				<td><p class="label">Rv</p>
				</td>
				<td><p class="label">Iv</p>
				</td>
				<td><p class="label">Ev</p>
				</td>
				<td><p class="label">Result</p>
				</td>
				</th>
				<?php 
				$ary=['H','A','B','C','D','S'];
				foreach ($ary as $elem){
				echo	sprintf(	'<tr><!-- %s -->',$elem);
				echo sprintf(	'	<td><input type="radio" name="rowhead" id="lable%s" class ="label rowhead">%s</td>',$elem,$elem);
				echo sprintf(	'	<td><input type ="text" id="r%s" class="rtext" readonly="readonly"/></td>',$elem);
				echo sprintf(	'	<td><input type ="text" id="i%s" class ="itext" /></td>',$elem);
				echo sprintf(	'	<td><input type ="text" id="e%s" class ="etext" /></td>',$elem);
				echo sprintf(	'	<td><p id="res%s" class="resp" /></td>',$elem);
				echo sprintf( '</tr>');
			}
			?>
			</table>
		</div>
		<div id="dright">
			<div id="container"></div>
		</div>
	</form>
</body>
</html>
