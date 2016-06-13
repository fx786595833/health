$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/role.php',
		type: 'post',
		dataType: 'text'
	})
	.done(function(data) {
		if(data=="manager"){
			window.location.href="authManager2.html";
		}
		else{
			$(".role").text("当前角色："+data);
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
})