<?php
    require("sqlite.php");
    $db = new MyDB();
    $id = $_COOKIE['user_id'];
    $time = $_POST['t'];
    $sql = "select distance,duration,step from user_handler where id=$id and time='$time'";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    $d = $row['distance'];
    $du = $row['duration'];
    $s = $row['step'];
    $c = 60 * $d *1.036;
    $du = getTime($du);
    echo $d."-".$du."-".$c."-".$s;

    function getTime($a){
        $str = explode(":",$a);
        return $str[0]."小时".$str[1]."分".$str[2]."秒";
    }