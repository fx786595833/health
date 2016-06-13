<?php
    require("sqlite.php");
    $db = new MyDB();
    $str = $_POST['i'];
    $result = explode("^",$str);
    if(sizeof($result)==3){
        $sql = "select id from auth where photo='$result[0]' and license='$result[1]'";
        $ret = $db->query($sql);
        $row = $ret->fetchArray(SQLITE3_ASSOC);
        $id = $row['id'];
        $sql = "update user set role='$result[2]' where id=$id";
        $db->exec($sql);
    }
    $sql = "delete from auth WHERE photo='$result[0]' and license='$result[1]'";
    $ret = $db->exec($sql);