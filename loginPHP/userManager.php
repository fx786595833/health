<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/3
 * Time: 8:35
 */
    require("sqlite.php");
    $db = new MyDB();
    $sql = "select role from user where id='$_COOKIE[user_id]'";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    if($row['role']!='systemManager'){
        echo false;
    }
    else {
        $i = $_POST['i'];
        $sql = "select head_pic,signature,nickname,role from user where role<>'systemManager' limit $i,10";
        $ret = $db->query($sql);
        $re = "";
        while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            $re = $re . $row['head_pic'] . ',' . $row['signature'] . ',' . $row['nickname'] . ',' . $row['role'] . ';';
        }
        echo $re;
    }
?>