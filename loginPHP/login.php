<?php
    if(!isset($_COOKIE['user_id'])) {
        require("sqlite.php");
        $db = new MyDB();
        $name = $_POST["username"];
        $psw = $_POST["psw"];
        $sql = "select psw,nickname from user where id=$name";
        $ret = $db->query($sql);
        $row = $ret->fetchArray(SQLITE3_ASSOC);
        $result = $row['psw'];
        $nickname = $row['nickname'];
        if ($result == $psw) {
            setcookie('user_id',$name,time()+3600);
            setcookie('psw',$psw,time()+3600);
            setcookie('nickname',$nickname,time()+3600);
            header("location:../HealthUI/health.html");
        }
        else
            header("location:../loginUI/login.html?v=0");
    }
    else{
        header("location:../HealthUI/health.html");
    }
?>
