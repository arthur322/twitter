$("textarea#content")
	.focusin(function(){
		$("#tweet-button").show("fast");
	})
	.focusout(function(){
		if($("textarea#content").val() == ""){
			$("#tweet-button").hide("fast");
		}
	});

var texto_antigo = $("#btn-unfollow").text();
$("#btn-unfollow").hover(function(){
	$("#btn-unfollow").css("background-color", "red").text("Deixar de seguir");
});

$("#btn-unfollow").mouseleave(function(){
	$("#btn-unfollow").css("background-color", "#007bff").text(texto_antigo);
});