<?php
    require("sqlite.php");
    $db = new MyDB();
    $id = $_COOKIE['user_id'];
    $sql = "select cover,summary from activity where id=$id";
    $ret = $db->query($sql);
    $re = '';
    while($row = $ret->fetchArray(SQLITE3_ASSOC)){
        $re = $re.$row['cover'].','.$row['summary'].';';
    }
    echo $re;
?>