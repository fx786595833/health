$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/logInfo.php',
		type: 'post',
		dataType: 'text'
	})
	.done(function(data) {
		$(".menu").append("<li><a href='../defaultSetting/basicSetting.html' class='user'>欢迎您，"+data+"</a></li>");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		$(".menu").append("<li><a href='http://localhost/project/loginPHP/logOut.php'>退出</a></li>");
	});
})