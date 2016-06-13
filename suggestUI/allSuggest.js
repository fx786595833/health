$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/allSuggest.php',
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
			$(".more").before("<div class='data'><img src='"+str1[0]+"' alt=''><p>"+str1[1]+"</p><p>"+str1[2]+"</p><div><p class='time'>"+str1[3]+"</p></div>"+str1[4]);
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
			url: 'http://localhost/project/loginPHP/allSuggest.php',
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
				$(".more").before("<div class='data'><img src='"+str1[0]+"' alt=''><p>"+str1[1]+"</p><p>"+str1[2]+"</p><div><p class='time'>"+str1[3]+"</p></div>"+str1[4]);
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

function respond(value){
	var d = $(value).parent().parent();
	var img = d.children('img');
	var title = img.next();
	var content = title.next();
	var res = $(value).parent().prev().children('textarea').val();
	var d = title.text()+"^"+content.text()+"^"+res;
	$.ajax({
		url: 'http://localhost/project/loginPHP/respond.php',
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

function respond2(value){
	$('#file').click();
	$('#file').bind('change', function() {
		var str = $('#file').val();
		var str2 = str.split(".");
		if(str2[1]=='xml'){
			$.get("information1.xml",function(xml){
				var result = '';
				$(xml).find('student').each(function(){
					var student = $(this);
					var id = student.attr("id");
					var name = student.find("name").text();
					var age = student.find("age").text();
					var sex = student.find("sex").text();
					var courseScore = student.find("courseScore").text();
					result = result+id+":"+name+","+age+","+sex+","+courseScore+";";
				});
				$("#signature").val(result);
			})
		}
		else if(str2[1]=='xls'){
			$.ajax({
				url: 'http://localhost/project/loginPHP/loadExcel.php',
				type: 'post',
				dataType: 'text'
			})
			.done(function(data) {
				$("#signature").val(data);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	});
}