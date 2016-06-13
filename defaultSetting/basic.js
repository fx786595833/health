$(function(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/basicSetting.php',
		type: 'post',
		dataType: 'text'
	})
	.done(function(data) {
		var str = new Array();
		str = data.split(",");
		$("input[name=nickname]").val(str[0]);
		if(str[1]=="男")
			$("input[name=sex]:eq(0)").attr("checked","checked");
		else
			$("input[name=sex]:eq(1)").attr("checked","checked");
		var ss = str[2].split("-");
		$("input[name=year]").val(ss[0]);
		$(".month ").get(0).selectedIndex=ss[1]-1;
		$(".day").get(0).selectedIndex=ss[2]-1;
		$("#location option[value="+str[3]+"]").attr("selected",true);
		$("input[name=role]").val(str[4]);
		$("textarea").text(str[5]);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
})