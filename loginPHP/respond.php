<?php
    require("sqlite.php");
    $i = $_POST['i'];
    $db = new MyDB();
    $id = $_COOKIE['user_id'];
    $result = explode("^",$i);
    $sql = "select suid from suggest_question where title='$result[0]' and content='$result[1]'";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    $suid = $row['suid'];
    $sql = "insert into suggest_answer(suid,id,content,time) VALUES ($suid,$id,'$result[2]',time())";
    $db->exec($sql);