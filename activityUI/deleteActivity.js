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
			$(".more").before("<div class='data'><img src='"+str1[0]+"' alt=''><p>"+str1[1]+"</p><button onclick='dele(this)'>删除</button></div>");
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
})

function dele(value){
	var result = confirm("确认删除?");
	if(result==true){
		var img = $(value).prev().prev().attr('src');
		var content = $(value).prev().text();
		var d = img+"^"+content;
		$.ajax({
			url: 'http://localhost/project/loginPHP/delActivity.php',
			type: 'post',
			data:{
				i:d
			}
		})
		.done(function(data) {
			history.go(0);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
}