<?php
    require("sqlite.php");
    $db = new MyDB();
    ini_set("max_execution_time","600");
    for($i=1000;$i<2200;$i++){
        $b = rand(1,100);
        $c = randomDate("01:00:00","12:00:00");
        $d = $b*100000/50;
        $time = "2015-12-07";
        $sql = "insert into user_handler(hid,id,distance,duration,step,time) VALUES ($i+3800,$i,$b,'$c',$d,'$time')";
        $ret = $db->exec($sql);
    }

    function randomDate($begintime, $endtime="") {
    $begin = strtotime($begintime);
    $end = $endtime == "" ? mktime() : strtotime($endtime);
    $timestamp = rand($begin, $end);
    return date("H:i:s", $timestamp);
    }
?>