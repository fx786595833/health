$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/access.php',
		type: 'post',
		data: {
			type: 'health'
		}
	})
	.done(function(data) {
		if(data==true){
			alert("对不起，您无权访问");
			history.go(-1);
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
})