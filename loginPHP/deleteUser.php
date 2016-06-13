<?php
    require("sqlite.php");
    $db = new MyDB();
    $str = $_POST['i'];
    $result = explode("^",$str);
    $img = $result[0];
    $signature = $result[1];
    $nickname = $result[2];
    $sql = "delete from user where head_pic='$img' and nickname='$nickname'";
    $ret = $db->exec($sql);
?>