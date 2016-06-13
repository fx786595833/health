function getData(){
	$.ajax({
		url: 'http://localhost/project/loginPHP/handlerInfo.php',
		type: 'post',
		data: {
			t: $("input[name=date]").val()
		},
	})
	.done(function(data) {
		var str = data.split("-");
		$(".distance").text("运动距离："+str[0]+"KM");
		$(".hour").text("运动时长："+str[1]);
		$(".burn").text("燃烧热量："+str[2]+"卡路里");
		$(".step").text("运动步数："+str[3]+"步");
		var a = str[3]/100000;
		if(a>=1){
			var s=document.createElement('style');
			var t=".data div:after{content:\"100%\";}";
	    	s.innerText=t;
	    	document.body.appendChild(s);
	    	if($(".result"))
	    		$(".result").remove();
	    	$(".content").append("<div class='result icon icon-cool2'>今天干的不错哟！</div>");
	    }
	    else{
	    	var s=document.createElement('style');
			var t=".data div:after{content:\""+parseInt(a*100)+"%\";}";
	    	s.innerText=t;
	    	document.body.appendChild(s);
	    	if($(".result"))
	    		$(".result").remove();
	    	$(".content").append("<div class='result icon icon-sad'>得加强运动量了！</div>");
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