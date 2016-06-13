<?php
    require("sqlite.php");
    $db = new MyDB();
    $i = $_POST['i'];
    $sql = "select id,photo,license,reason from auth limit $i,10";
    $ret = $db->query($sql);
    $re = "";
    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        $sql2 = "select head_pic from user where id=".$row['id'];
        $ret2 = $db->query($sql2);
        $row2 = $ret2->fetchArray(SQLITE3_ASSOC);
        $re = $re . $row2['head_pic'] . ',' . $row['photo'] . ',' . $row['license'] . ',' . $row['reason'] . ';';
    }
    echo $re;