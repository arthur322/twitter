$("textarea#content")
	.focusin(function(){
		$("#tweet-button").show("fast");
	})
	.focusout(function(){
		if($("textarea#content").val() == ""){
			$("#tweet-button").hide("fast");
		}
	});

$("#btn-seguir").hover(function(){
	if($("#btn-seguir").is(':disabled')){
		$("#btn-seguir").css("bac")
	}
});