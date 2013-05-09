<html>
<head></head>
<body>

	<p>Detail</p>
	<input type="text" readonly="readonly" id="rest" value="510"/>
	<div id="Hslider"></div><br/>
	<div id="Aslider"></div><br/>
	<div id="Bslider"></div><br/>
	<div id="Cslider"></div><br/>
	<div id="Dslider"></div><br/>
	<div id="Sslider"></div><br/>
<script>
<!--
function vals(func){
	var values={
        range: 'min', value: 0,  min: 0,    max: 255, step:4,
        change: func,
        slide:function(){},
    };
    return values;
}
function res(){
	return 510-(
			$( '#Hslider' ).slider('value')+$( '#Aslider' ).slider('value')+$( '#Bslider' ).slider('value')+
			$( '#Cslider' ).slider('value')+$( '#Dslider' ).slider('value')+$( '#Sslider' ).slider('value'));
}
$( function() {
    $( '#Hslider' ).slider(
    	    vals(function(event,ui){
        	    var lastval=res();
    	    	$('#rest').val(lastval);
    	    	if(lastval<=0){
        	    	return false; 	
        	    }
        	        	    	    	
	    }));
    $( '#Aslider' ).slider( vals(function(event,ui){}));
    $( '#Bslider' ).slider( vals(function(event,ui){}));
    $( '#Cslider' ).slider( vals(function(event,ui){}));
    $( '#Dslider' ).slider( vals(function(event,ui){}));
    $( '#Sslider' ).slider( vals(function(event,ui){}));
    jQuery( '#rest' ) . val(510);
} );
// -->
</script>
</body>
</html>