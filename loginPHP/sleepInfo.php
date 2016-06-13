<?php
    require("sqlite.php");
    $db = new MyDB();
    $id = $_COOKIE['user_id'];
    $time = $_POST['t'];
    $sql = "select start_time,end_time,valid_time from user_sleep where id=$id and time='$time'";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    $s = $row['start_time'];
    $e = $row['end_time'];
    $v = $row['valid_time'];
    $valid = randomDate("00:00:00",$v);
    $xx = floor(get($valid)/get($v)*100);
    $s = getTime($s);
    $e = getTime($e);
    $v = getTime($v);
    $valid = getTime($valid);
    echo $s."-".$e."-".$v."-".$valid."-".$xx;

    function randomDate($begintime, $endtime="") {
    $begin = strtotime($begintime);
    $end = $endtime == "" ? mktime() : strtotime($endtime);
    $timestamp = rand($begin, $end);
    return date("H:i:s", $timestamp);
    }

    function get($t){
        $str = explode(":",$t);
        return $str[0]*3600+$str[1]*60+$str[2];
    }
    function getTime($a){
        $str = explode(":",$a);
        return $str[0]."小时".$str[1]."分".$str[2]."秒";
    }