$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/roleAuth2.php',
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
			$(".more").before("<div class='data'><img src='"+str1[0]+"'><img src='"+str1[1]+"'><img src='"+str1[2]+"'><p>"+str1[3]+"</p><button onclick='agree(this)'>同意</button><button onclick='disagree(this)'>拒绝</button></div>");
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
			url: 'http://localhost/project/loginPHP/roleAuth2.php',
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
				$(".more").before("<div class='data'><img src='"+str1[0]+"'><img src='"+str1[1]+"'><img src='"+str1[2]+"'><p>"+str1[3]+"</p><button onclick='agree(this)'>同意</button><button onclick='disagree(this)'>拒绝</button></div>");
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

function agree(value){
	var result = confirm("确认同意？");
	if(result==true){
		var img2 = $(value).prev().prev().prev().attr('src');
		var img3 = $(value).prev().prev().attr('src');
		var role = $(value).prev().text();
		var d = img2+"^"+img3+"^"+role;
		$.ajax({
			url: 'http://localhost/project/loginPHP/agreeAuth.php',
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

function disagree(value){
	var result = confirm("确认删除？");
	if(result==true){
		var img2 = $(value).prev().prev().prev().prev().attr('src');
		var img3 = $(value).prev().prev().prev().attr('src');
		var d = img2+"^"+img3;
		$.ajax({
			url: 'http://localhost/project/loginPHP/agreeAuth.php',
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