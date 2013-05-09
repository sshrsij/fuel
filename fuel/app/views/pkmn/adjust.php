<html>
<style type="text/css"> <!--
.input{
width:60px;
height:30px;
}
 --></style>
<body>
<div style="">
<div id="container" style="width: 300px; height: 500px; "></div>
</div>
<div style="position:relative; top:-400; left:300;">
<form>
	<select id="spec" size="2">	
	</select>
	<br/>
	<hr/>
	<table>
		<tr>
			<td></td><td>RV</td><td>IV</td><td>EV</td>
		</tr>
		<tr>
			<td>H</td>
			<td><input type="text" id='rh' class='input' maxlength="3" /></td>
			<td><input type="text" id='ih' class='input' maxlength="2" /></td>
			<td><input type="text" id='eh' class='input' maxlength="3" /></td>
		</tr>
		<tr>
			<td>A</td>
			<td><input type="text" id='ra' class='input' maxlength="3" /></td>
			<td><input type="text" id='ia' class='input' maxlength="2" /></td>
			<td><input type="text" id='ea' class='input' maxlength="3" /></td>
		</tr>
		<tr>
			<td>B</td>
			<td><input type="text" id='rb' class='input' maxlength="3" /></td>
			<td><input type="text" id='ib' class='input' maxlength="2" /></td>
			<td><input type="text" id='eb' class='input' maxlength="3" /></td>
		</tr>
		<tr>
			<td>C</td>
			<td><input type="text" id='rc' class='input' maxlength="3" /></td>
			<td><input type="text" id='ic' class='input' maxlength="2" /></td>
			<td><input type="text" id='ec' class='input' maxlength="3" /></td>
		</tr>
		<tr>
			<td>D</td>
			<td><input type="text" id='rd' class='input' maxlength="3" /></td>
			<td><input type="text" id='id' class='input' maxlength="2" /></td>
			<td><input type="text" id='ed' class='input' maxlength="3" /></td>
		</tr>		
		<tr>
			<td>S</td>
			<td><input type="text" id='rs' class='input' maxlength="3" /></td>
			<td><input type="text" id='is' class='input' maxlength="2" /></td>
			<td><input type="text" id='es' class='input' maxlength="3" /></td>
		</tr>		
		</table>
	<br/>
	<input type="text" id='nametext' value="""/>
	<input type="button" id='add' value="Add" onclick="addStatus();"/>	
	<br/>
	</form>
</div>

<script> /*status class*/
var Status=function()
{
	this.efforts=[0,0,0,0,0,0];
	this.races =[0,0,0,0,0,0];		
	this.seeds =[0,0,0,0,0,0];
	this.lv=50;
	this.title="a";
	this.guid=GUID();
	/*実数値*/
	this.array=function()
	{
		var hval = ( ((this.races[0]*2+this.seeds[0]+this.efforts[0]/4)*this.lv/100) |0) +10+this.lv;
		var aval = ( ( ((this.races[1]*2+this.seeds[1]+this.efforts[1]/4)*this.lv/100) +5) |0) *1;
		var bval = ( ( ((this.races[2]*2+this.seeds[2]+this.efforts[2]/4)*this.lv/100) +5) |0)*1;
		var cval = ( ( ((this.races[3]*2+this.seeds[3]+this.efforts[3]/4)*this.lv/100) +5) |0)*1;
		var dval = ( ( ((this.races[4]*2+this.seeds[4]+this.efforts[4]/4)*this.lv/100) +5) |0)*1;
		var sval = ( ( ((this.races[5]*2+this.seeds[5]+this.efforts[5]/4)*this.lv/100) +5) |0)*1;
 		return [hval,aval,bval,cval,dval,sval];
	};
	/*html要素化*/
	this.html=function()
	{
		return '<option onclick="selectfromArray( \''+this.guid+'\' );" value="'+this.guid+'">'+this.title+'</option>';	
	};
	this.random=function()
	{
		for(var idx=0;idx<this.seeds.length;idx++){
			this.seeds[idx] =(Math.random()*32) | 0;
			this.races[idx] =(Math.random()*150) | 0;
		}
	}
}
</script>
<script>
var sArray=[];
/**/
function selectfromArray(guid)
{
	var selected=-1;
	for(var idx=0;idx<sArray.length;idx++){
		if(guid==sArray[idx].guid)
			{			
				selected=idx;
			}
	}
	if(selected<0){return;}
	
}
var addcnt=0;
/**値の更新*/
function addStatus()
{
	var newone=new Status();		
	newone.random();

	newone.title= ($("#nametext").val().length <=0 )  ?  
			newone.title+"("+(++addcnt)+")" :
			$("#nametext").val();	
	chart.addSeries({
		stack : newone.guid,
		name: newone.title , 
		data: newone.array() });
	$("#spec").append(newone.html());
	sArray.push(newone);
	updateStatus(newone);
}
function updateStatus(newone)
{
		inputToText(newone);
};
function inputToText(newone)
{	
	$("#rh").val(newone.races[0]);	$("#ih").val(newone.seeds[0]);	$("#eh").val(newone.efforts[0]);
	$("#ra").val(newone.races[1]);	$("#ia").val(newone.seeds[1]);	$("#ea").val(newone.efforts[1]);
	$("#rb").val(newone.races[2]);	$("#ib").val(newone.seeds[2]);	$("#eb").val(newone.efforts[2]);
	$("#rc").val(newone.races[3]);	$("#ic").val(newone.seeds[3]);	$("#ec").val(newone.efforts[3]);
	$("#rd").val(newone.races[4]);	$("#id").val(newone.seeds[4]);	$("#ed").val(newone.efforts[4]);
	$("#rs").val(newone.races[5]);	$("#is").val(newone.seeds[5]);	$("#es").val(newone.efforts[5]);
}
</script>
<script>
var chart;
$(function () {
	
	chart= new Highcharts.Chart({
        chart: {
        	renderTo:'container',
        	type: 'bar'
        },
        title: {
            text: 'Historic World Population by Region'
        },
        subtitle: {
            text: 'Source: Wikipedia.org'
        },
        xAxis: {
            categories: ['H','A','B','C','D','S'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: 200,
            y: 210,
            floating: true,
            borderWidth: 1,
            backgroundColor: '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: []
    });
    var first=new Status();
	first.races=[
			<?php echo $content->H;?>,
			<?php echo $content->A;?>,                    	
            <?php echo $content->B;?>,
            <?php echo $content->C;?>,
            <?php echo $content->D;?>,                    	
            <?php echo $content->S;?>]
    updateStatus(first);
});
</script>

</body>
</html>