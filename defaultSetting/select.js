function select(value){
	$(".content a").removeClass('on');
	$(value).addClass('on');
	getAccess($(value).text());
}

$(function(){
	getAccess('个人用户');

	$("button").bind("click",function(){
		$.ajax({
			url: 'http://localhost/project/loginPHP/updateAccess.php',
			type: 'post',
			data: {
				type:$(".on").text(),
				health:$("#health").attr('checked'),
				activity:$("#activity").attr('checked'),
				suggestion:$("#suggestion").attr('checked'),
				setting:$("#setting").attr('checked')
		    }
		})
		.done(function(data) {
			alert(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	})
})

function getAccess(dd){
	$.ajax({
		url: 'http://localhost/project/loginPHP/accessList.php',
		type: 'post',
		dataType: 'text',
		data: {
			type : dd
		}
	})
	.done(function(data) {
		var str = data.split("-");
		if(str[0]==1)
			$("#health").attr("checked",true);
		else
			$("#health").attr("checked",false);
		if(str[1]==1)
			$("#activity").attr("checked",true);
		else
			$("#activity").attr("checked",false);
		if(str[2]==1)
			$("#suggestion").attr("checked",true);
		else
			$("#suggestion").attr("checked",false);
		if(str[3]==1)
			$("#setting").attr("checked",true);
		else
			$("#setting").attr("checked",false);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}