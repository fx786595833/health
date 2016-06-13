<?php
    require("sqlite.php");
    $db = new MyDB();
    $nickname = $_POST["nickname"];
    $id = $_POST["id"];
    $sql = "select psw from user where nickname='$nickname' and id=$id";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    $result = $row['psw'];
    $url = "../loginUI/login.html";
    echo "<script>
    alert('您的密码为$result');
    location.href='" . $url . "';
    </script>";
?>