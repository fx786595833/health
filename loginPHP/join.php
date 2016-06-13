<?php
    require("sqlite.php");
    $db = new MyDB();
    $s = $_POST['pp'];
    $c = $_POST['content'];
    $i = $_POST['i'];
    $id = $_COOKIE['user_id'];
    $sql = "select aid from activity where summary='$s' and cover='$i' and content='$c'";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    $aid = $row['aid'];
    $sql = "insert into activity_user(aid,uid) VALUES ($aid,$id)";
    $db->exec($sql);