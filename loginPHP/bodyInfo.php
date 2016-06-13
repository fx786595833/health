<?php
    require("sqlite.php");
    $db = new MyDB();
    $id = $_COOKIE['user_id'];
    $sql = "select height,weight,heart_rate,high_blood,low_blood from user_health where id=$id";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    echo $row['height']."-".$row['weight']."-".$row['heart_rate']."-".$row['high_blood']."-".$row['low_blood'];