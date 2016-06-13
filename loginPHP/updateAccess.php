<?php
    require("sqlite.php");
    $db = new MyDB();
    $type = $_POST['type'];
    $health = $_POST['health'];
    $activity = $_POST['activity'];
    $suggestion = $_POST['suggestion'];
    $setting = $_POST['setting'];
    if($type=='个人用户')
        $type = 'personal user';
    else if($type == '医生')
        $type = 'doctor';
    else if($type == '教练')
        $type = 'coach';
    $id1 = 0;
    $id2 = 0;
    $id3 = 0;
    $id4 = 0;
    if($health='checked')
        $id1 = 1;
    if($activity='checked')
        $id2 = 1;
    if($suggestion='checked')
        $id3 = 1;
    if($setting='checked')
        $id4 = 1;
    $sql = "update access set health=$id1,activity=$id2,suggestion=$id3,setting=$id4 where role='$type'";
    $ret = $db->exec($sql);
    echo $ret;
