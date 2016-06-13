$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/activity.php',
		type: 'post',
		dataType: 'text'
	})
	.done(function(data) {
		var str = data.split(";");
		for(var i=0;i<str.length-1;i++){
			var str1 = str[i].split(",");
			$(".more").before("<div class='data'><img src='"+str1[0]+"' alt=''><p>"+str1[1]+"</p><button onclick='modify(this)'>修改</button></div>");
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
})

function modify(value){
	var p = $(value).prev().text();
	var img = $(value).prev().prev().attr('src');
	$.ajax({
		url: 'http://localhost/project/loginPHP/modifyActivity.php',
		type: 'post',
		data: {
			pp: p,
			i : img
		}
	})
	.done(function() {
		location.href='mainModify.html';
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}