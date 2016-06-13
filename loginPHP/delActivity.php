<?php
    require("sqlite.php");
    $db = new MyDB();
    $str = $_POST['i'];
    $result = explode("^",$str);
    $img = $result[0];
    $summary = $result[1];
    $sql = "select aid from activity WHERE cover='$img' and summary='$summary'";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    $aid = $row['aid'];
    $sql = "delete from activity_user WHERE aid=$aid";
    $db->exec($sql);
    $sql = "delete from activity WHERE aid=$aid";
    $db->exec($sql);