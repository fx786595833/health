/**
 * Created by admin on 2016/6/24.
 */
var status = getCookie("login");
$(".setting").css("display","none");
$(".logout").css("display","none");
if(status != null){;
    $(".logout").css("display","block");
    $(".setting").css("display","block")
    $(".login").css("display","none");
    var username = getCookie("nickname");
    $(".setting").html("欢迎你,"+username);
    $(".social-icons a").css("width","100px");
}