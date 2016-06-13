<?php
    require("sqlite.php");
    $db = new MyDB();
    $sql = "select role from user where id='$_COOKIE[user_id]'";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    if($row['role']!='systemManager')
        echo $row['role'];
    else
        echo "manager";
?>