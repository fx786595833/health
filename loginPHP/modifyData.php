<?php
    require("sqlite.php");
    $db = new MyDB();
    $name = $_COOKIE["user_id"];
    $p = $_COOKIE['p'];
    $img = $_COOKIE['img'];
    $sql = "select aid,title,writer,content from activity where summary='$p' and cover='$img' and id=$name";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    $result = $row['title']."-".$row['writer']."-".$p."-".$row['content'];
    setcookie('p','',time()-3600);
    setcookie('img','',time()-3600);
    setcookie('aid',$row['aid'],time()+120);
    echo $result;