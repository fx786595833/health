$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/logInfo.php',
		type: 'post',
		dataType: 'text'
	})
	.done(function(data) {
		$(".menu").append("<li><a href='../defaultSetting/basicSetting.html' class='username'>welcome:"+data+"</a></li>");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		$(".menu").append("<li><a class='exit' href='http://localhost/project/loginPHP/logOut.php'>退出</a></li>");
	});
})