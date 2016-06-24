$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/bodyInfo.php',
		type: 'post',
		dataType: 'text'
	})
	.done(function(data) {
		var str = data.split("-");
		$("input[name=height]").val(str[0]);
		$("input[name=weight]").val(str[1]);
		$("input[name=rate]").val(str[2]);
		$("input[name=high]").val(str[3]);
		$("input[name=low]").val(str[4]);
		var bmi = str[1]/str[0]/str[0]*10000;
		if(bmi>=24.0)
			$("form").append("<div class='result icon icon-sad'>您的体重过重哟~</div>");
		else if(bmi>=18.5)
			$("form").append("<div class='result icon icon-wink2'>您的身体很健康哦~</div>");
		else
			$("form").append("<div class='result icon icon-sad'>您的体重过轻哦~</div>");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
})
