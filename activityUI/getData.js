$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/modifyData.php',
		type: 'post',
		dataType: 'text'
	})
	.done(function(data) {
		var str = data.split("-");
		$("input[name=title]").val(str[0]);
		$("input[name=writer]").val(str[1]);
		$("#summary").text(str[2]);
		$("#content").text(str[3]);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
})