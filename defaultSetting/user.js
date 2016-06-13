$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/userManager.php',
		type: 'post',
		dataType: 'text',
		data:{
			i:0
		}
	})
	.done(function(data) {
		if(data==false){
			alert("您无权访问");
			history.back(-1);
		}
		else{
			var str = data.split(";");
			for(var i=0;i<str.length-1;i++){
				var str1 = str[i].split(",");
				$(".more").before("<div class='data'><img src='"+str1[0]+"' alt=''><p>"+str1[1]+"</p><p>"+str1[2]+"<br>"+str1[3]+"</p><button onclick='dele(this)'>删除</button></div>");
			}
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
			url: 'http://localhost/project/loginPHP/userManager.php',
			type: 'post',
			dataType: 'text',
			data:{
				i:$(".data").length
			}
		})
		.done(function(data) {
			if(data==false){
				alert("您无权访问");
				history.back(-1);
			}
			else{
				var str = data.split(";");
				for(var i=0;i<str.length-1;i++){
					var str1 = str[i].split(",");
					$(".more").before("<div class='data'><img src='"+str1[0]+"' alt=''><p>"+str1[1]+"</p><p>"+str1[2]+"<br>"+str1[3]+"</p><button onclick='dele(this)'>删除</button></div>");
				}
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

function dele(value){
	var result = confirm("确认删除？");
	if(result==true){
		var img = $(value).prev().prev().prev().attr('src');
		var signature = $(value).prev().prev().text();
		var nickname = $(value).prev().html();
		var str = nickname.split("<br>");
		var d = img+"^"+signature+"^"+str[0];
		$.ajax({
			url: 'http://localhost/project/loginPHP/deleteUser.php',
			type: 'post',
			data:{
				i:d
			}
		})
		.done(function(data) {
			alert("删除成功");
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