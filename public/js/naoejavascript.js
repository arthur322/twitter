$("textarea#content")
	.focusin(function(){
		$("#tweet-button").show("fast");
	})
	.focusout(function(){
		if($("textarea#content").val() == ""){
			$("#tweet-button").hide("fast");
		}
	});