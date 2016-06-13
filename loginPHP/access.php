<?php
    require("sqlite.php");
    $db = new MyDB();
    $id = $_COOKIE['user_id'];
    $sql = "select role from user where id=$id";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    if($row['role']=='systemManager'){
    }
    else{
        $role = $row['role'];
        $data = $_POST['type'];
        $sql = "select $data from access where role='$role'";
        $ret = $db->query($sql);
        $row = $ret->fetchArray(SQLITE3_ASSOC);
        if($row["$data"]==0){
            echo true;
        }
    }