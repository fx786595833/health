<?php
    require("sqlite.php");
    $db = new MyDB();
    $name = $_GET['nickname'];
    $sex = $_GET['sex'];
    $year = $_GET['year'];
    $month = $_GET['month'];
    $day = $_GET['day'];
    $location = $_GET['location'];
    $signature = $_GET['signature'];
    $id = $_COOKIE["user_id"];
    $sql = "update user set nickname='$name',gender='$sex',birth='$year-$month-$day',location='$location',signature='$signature' WHERE id=$id";
    $ret = $db->exec($sql);
    setcookie("nickname",$name,time()+3600);
    header("location:../defaultSetting/basicSetting.html");
?>