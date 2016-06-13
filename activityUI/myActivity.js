$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/myActivity.php',
		type: 'post',
		dataType: 'text',
		data:{
			i:0
		}
	})
	.done(function(data) {
		var str = data.split("#");
		for(var i=0;i<str.length-1;i++){
			var str1 = str[i].split("^");
			$(".more").before("<div class='data'><img src='"+str1[0]+"' alt=''><p>"+str1[1]+"</p><p>"+str1[2]+"</p><div><p class='time'>"+str1[3]+"</p></div>");
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});

	$(".more").bind("click",function(){
		$.ajax({
			url: 'http://localhost/project/loginPHP/myActivity.php',
			type: 'post',
			dataType: 'text',
			data:{
				i:$("data").length
			}
		})
		.done(function(data) {
			var str = data.split("#");
			for(var i=0;i<str.length-1;i++){
				var str1 = str[i].split("^");
				$(".more").before("<div class='data'><img src='"+str1[0]+"' alt=''><p>"+str1[1]+"</p><p>"+str1[2]+"</p><div><p class='time'>"+str1[3]+"</p></div>");
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	})
})