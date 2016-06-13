<?php
    require("sqlite.php");
    $db = new MyDB();
    $id = $_COOKIE['user_id'];
    $sql = "select id,suid,title,content,time from suggest_question where id<>$id";
    $ret = $db->query($sql);
    $re = '';
    while($row = $ret->fetchArray(SQLITE3_ASSOC)){
        $id = $row['id'];
        $sql2 = "select head_pic from user where id=$id";
        $ret2 = $db->query($sql2);
        $row2 = $ret2->fetchArray(SQLITE3_ASSOC);
        $re = $re.$row2['head_pic'].'^'.$row['title'].'^'.$row['content'].'^'.$row['time'].'^';
        $id = $row['suid'];
        $sql3 = "select id,content,time from suggest_answer where suid=$id";
        $ret3 = $db->query($sql3);
        while($row3 = $ret3->fetchArray(SQLITE3_ASSOC)) {
            $userid = $row3['id'];
            $sql4 = "select nickname,role from user where id=$userid";
            $ret4 = $db->query($sql4);
            $row4 = $ret4->fetchArray(SQLITE3_ASSOC);
            $nickname = $row4['nickname'];
            $role = $row4['role'];
            $content = $row3['content'];
            $time = $row3['time'];
            $re = $re . "<div class='respond'>$nickname($role)回复：$content&nbsp&nbsp&nbsp&nbsp&nbsp$time</div>";
        }
        $re = $re."<div class='respond1'><textarea name='signature' id='signature' cols='30' rows='10' style='width:400px;height:100px;'></textarea></div><div class='respond2'><button onclick='respond(this)'>回复</button><button onclick='respond2(this)'>导入</button><input type='file' id='file' accept='.xml,.xls' hidden></div>#";
    }
    echo $re;