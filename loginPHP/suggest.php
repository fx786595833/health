<?php
    require("sqlite.php");
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_COOKIE["user_id"];
    $sql='';
    $uid = rand(1,10000000);
    $db = new MyDB();
    $sql = "insert into suggest_question(suid,id,title,content,time) VALUES ($uid,$id,'$title','$content',time())";
    $ret = $db->exec($sql);
    echo "<script>alert('发布成功');location.href='../suggestUI/deliverSuggest.html';</script>";