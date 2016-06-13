$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/joinActivity.php',
		type: 'post',
		dataType: 'text',
		data:{
			i:0
		}
	})
	.done(function(data) {
		var str = data.split(";");
		for(var i=0;i<str.length-1;i++){
			var str1 = str[i].split(",");
			$(".more").before("<div class='data'><img src='"+str1[0]+"' alt=''><p>"+str1[1]+"</p><p hidden>"+str1[2]+"</p><button onclick='join(this)'>参与</button></div>");
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
			url: 'http://localhost/project/loginPHP/joinActivity.php',
			type: 'post',
			dataType: 'text',
			data:{
				i:$(".data").length
			}
		})
		.done(function(data) {
			var str = data.split(";");
			for(var i=0;i<str.length-1;i++){
				var str1 = str[i].split(",");
				$(".more").before("<div class='data'><img src='"+str1[0]+"' alt=''><p>"+str1[1]+"</p><p hidden>"+str1[2]+"</p><button onclick='join(this)'>参与</button></div>");
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

function join(value){
	var c = $(value).prev().text();
	var p = $(value).prev().prev().text();
	var img = $(value).prev().prev().prev().attr('src');
	$.ajax({
		url: 'http://localhost/project/loginPHP/join.php',
		type: 'post',
		data: {
			pp: p,
			i : img,
			content:c
		}
	})
	.done(function(data) {
		alert("已参加");
		location.href='joinActivity.html';
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}