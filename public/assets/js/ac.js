$(document).ready(function() {
	$('#autocomp').autocomplete({
		source : function(req, resp) {
			$.ajax({
				url : "/fuel/public/api/text",
				type : "GET",
				cache : false,
				dataType : "json",
			    data: {
				      q: req.term
				    },				
				success : function(o) {
					resp(o);
				},
				error : function(xhr, ts, err) {
					resp([ '' ]);
				}
			});
		}
	});
});