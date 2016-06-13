<?php
    require("sqlite.php");
    $db = new MyDB();
    $id = $_COOKIE['user_id'];
    $w = $_POST['weight'];
    $h = $_POST['height'];
    $r = $_POST['rate'];
    $hi = $_POST['high'];
    $l = $_POST['low'];
    $sql = "update user_health set height=$h,weight=$w,heart_rate=$r,high_blood=$hi,low_blood=$l where id=$id";
    $db->exec($sql);
    header("location:../HealthUI/bodyManager.html");
