
<div style="">
<div id="container" style="width: 300px; height: 500px; "></div>
</div>
<div style="position:relative; top:-400; left:300;">
<form>
	<table>
		<tr>
			<td>s</td><td>i</td><td>e</td>
		</tr>
		<tr>
			<td><input type="text" id='s' value="""/></td>
			<td></td><td></td>
		</tr>
	</table>
	<br/>
	<input type="text" id='nametext' value="""/>
	<input type="button" id='add' value="Add" onclick="updateValue();"/>	
	<br/>
	<hr/>
	<select id="spec" size="2">	
		<option value="sample">sample</option>
	</select>
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
	if(selected>=0){
		alert(chart.series[selected+1].name);
	}
	
}
var addcnt=0;
/**値の更新*/
function updateValue()
{
	var newone=new Status();	
	newone.title= ($("#nametext").val().length <=0 )  ?  
		newone.title+"("+(++addcnt)+")" :
		$("#nametext").val();
	
	newone.random();
	chart.addSeries({
		stack : newone.guid,
		name: newone.title , 
		data: newone.array() });
	$("#spec").append(newone.html());
	sArray.push(newone);
};

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
        series: [{
            name: 'sample',
            data: [80,80,80,80,80,80]
        }]
    });
});
</script>