<?php
    require("sqlite.php");
    $db = new MyDB();
    $t = $_POST['title'];
    $w = $_POST['writer'];
    $s = $_POST['summary'];
    $c = $_POST['content'];
    $a = $_COOKIE['aid'];
    $sql = "update activity set title='$t',writer='$w',summary='$s',content='$c' where aid=$a";
    $db->exec($sql);
    setcookie('aid','',time()-3600);
    header("location:../activityUI/modifyActivity.html");
