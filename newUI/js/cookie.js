function getCookie(c_name) {
    if (document.cookie.length>0) {
        c_start=document.cookie.indexOf(c_name + "=")
        if (c_start!=-1) {
            c_start=c_start + c_name.length+1
            c_end=document.cookie.indexOf(";",c_start)
            if (c_end==-1) c_end=document.cookie.length
            return unescape(document.cookie.substring(c_start,c_end))
        }
    }
    return ""
}
function setCookie(c_name,value,expiredays) {
    var exdate=new Date()
    exdate.setDate(exdate.getDate()+expiredays)
    document.cookie=c_name+ "=" +escape(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
}
function delCookie(name) {
    var exp = new Date();
    exp.setTime (exp.getTime() - 1);
    var cval = GetCookie (name);
    document.cookie = name + "=" + cval + "; expires="+ exp.toGMTString();
}
function clearCookie(){
    var strCookie=document.cookie;
    var arrCookie=strCookie.split("; "); // 将多cookie切割为多个名/值对
    for(var i=0;i<arrCookie.length;i++)
    { // 遍历cookie数组，处理每个cookie对
        var arr=arrCookie[i].split("=");
        if(arr.length>0)
            delCookie(arr[0]);
    }
}