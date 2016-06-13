function getData(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/sleepInfo.php',
		type: 'post',
		data: {
			t: $("input[name=date]").val()
		},
	})
	.done(function(data) {
		var str = data.split("-");
		$(".start").text("睡眠开始："+str[0]);
		$(".end").text("睡眠结束："+str[1]);
		$(".hour").text("睡眠总时长："+str[2]);
		$(".valid").text("有效时长："+str[3]);
		var s=document.createElement('style');
		var t=".data div:after{content:\""+str[4]+"%\";}";
	    s.innerText=t;
	    document.body.appendChild(s);
	    if(str[4]>50){
	    	if($(".result"))
	    		$(".result").remove();
	    	$(".content").append("<div class='result icon icon-wink2'>今天睡得不错哟~</div>");
	    }
	    else{
	    	if($(".result"))
	    		$(".result").remove();
	    	$(".content").append("<div class='result icon icon-sad'>今天睡的太差了</div>");
	    }
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}

$(function(){
	getData();
})