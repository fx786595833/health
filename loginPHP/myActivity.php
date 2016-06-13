<?php
    require("sqlite.php");
    $db = new MyDB();
    $id = $_COOKIE['user_id'];
    $sql = "select cover,summary,content,time from activity where aid in(select u.aid from activity_user u where uid=$id)";
    $ret = $db->query($sql);
    $re = '';
    while($row = $ret->fetchArray(SQLITE3_ASSOC)){
        $re = $re.$row['cover'].'^'.$row['summary'].'^'.$row['content'].'^'.$row['time'].'#';
    }
    echo $re;