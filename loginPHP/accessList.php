<?php
    require("sqlite.php");
    $db = new MyDB();
    $type = $_POST['type'];
    if($type=='个人用户')
        $type = 'personal user';
    else if($type == '医生')
        $type = 'doctor';
    else if($type == '教练')
        $type = 'coach';
    $sql = "select health,activity,suggestion,setting from access where role='$type'";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    $result = $row['health']."-".$row['activity']."-".$row['suggestion']."-".$row['setting'];
    echo $result;