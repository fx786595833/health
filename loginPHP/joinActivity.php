<?php
    require("sqlite.php");
    $db = new MyDB();
    $i = $_POST['i'];
    $sql = "select cover,summary,content from activity where id<>'$_COOKIE[user_id]' and aid not in(select u.aid from activity_user u where uid='$_COOKIE[user_id]') order by time desc limit $i,10";
    $ret = $db->query($sql);
    $re = '';
    while($row = $ret->fetchArray(SQLITE3_ASSOC)){
        $re = $re.$row['cover'].','.$row['summary'].','.$row['content'].';';
    }
    echo $re;
?>