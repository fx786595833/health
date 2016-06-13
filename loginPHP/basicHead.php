<?php
    require("sqlite.php");
    $db = new MyDB();
    $name = $_COOKIE["user_id"];
    $sql = "select head_pic from user where id=$name";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    $picture = $row['head_pic'];
    echo $picture;
?>