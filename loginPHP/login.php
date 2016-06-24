<?php
    if(!isset($_COOKIE['user_id'])) {
        require("sqlite.php");
        $db = new MyDB();
        $name = $_POST["username"];
        $psw = $_POST["password"];
        $sql = "select psw,nickname from user where id=$name";
        $ret = $db->query($sql);
        $row = $ret->fetchArray(SQLITE3_ASSOC);
        $result = $row['psw'];
        $nickname = $row['nickname'];
        if ($result == $psw) {
            setcookie('user_id',$name,time()+3600);
            setcookie('password',$psw,time()+3600);
            setcookie('nickname',$nickname,time()+3600);
            header("location:../newUI/health/health.html");
        }
        else
            header("location:../newUI/login.html?v=0");
    }
    else{
        header("location:../newUI/health/health.html");
    }
?>
