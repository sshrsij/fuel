/*
 * 
 * @param {type} target selector of target (e.g. "#container")
 * @param {type} status array of status (e.g. [1,2,1,2,1,1])
 * @param {type} option 
 * @returns {undefined}
 */
function drawPolarchart(target, status, option) {
    if (!('title' in option)) {
	option.title = 'status';
    }
    if (!('legend') in option) {
	option.legend = ['H', 'A', 'B', 'C', 'D', 'S'];
    }

    /*draw chart*/
    $(target).highcharts({
	credits:{
	    enabled:false
	},
	chart: {
	    polar: true
	},
	title: {
	    text: option.title
	},
	pane: {
	    startAngle: -30,
	    endAngle: 330
	},
	xAxis: {
	    categories:option.legend,
	    title:{text:null}
	},
	yAxis: {
	   tickPositions:[0,70,100,130]
	},
	legend:{
	    enabled:false
	},
	tooltip:{
	   formatter:function(){
	       return '<b>'+this.x+':'+this.y+'</b>';
	   } 
	},
	plotOptions: {
	    column: {
		pointPadding: 0,
		groupPadding: 0
	    }
	},
	series: [{
		type: 'column',
		name: 'Column',
		data: status,
		//pointPlacement: 'between'
	    }]
    });
}