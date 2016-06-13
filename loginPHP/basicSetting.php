<?php
    require("sqlite.php");
    $db = new MyDB();
    $name = $_COOKIE["user_id"];
    $sql = "select nickname,gender,birth,location,role,signature from user where id=$name";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    $nick = $row['nickname'];
    $gender = $row['gender'];
    $birth = $row['birth'];
    $location = $row['location'];
    $role = $row['role'];
    $sign = $row['signature'];
    echo "$nick,$gender,$birth,$location,$role,$sign";
?>