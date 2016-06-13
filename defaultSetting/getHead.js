$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/basicHead.php',
		type: 'post',
		dataType: 'text'
	})
	.done(function(data) {
		if(data!=null){
			$("img").attr("src",data);
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
})