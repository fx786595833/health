<?php
    require("sqlite.php");
    $db = new MyDB();
    $name = $_POST["id"];
    $psw = $_POST["psw"];
    $nickname = $_POST["nickname"];
    $configpsw = $_POST["configpsw"];
    $gender = "male";

    $sql1 ="select count(*) as n from user where id = $name";
    $sql2 =<<<EOF
          INSERT INTO user (id,psw,nickname,gender)
          VALUES ($name,$psw,'$nickname','$gender');
EOF;

    $count = $db->query($sql1);
    $item = $count->fetchArray(SQLITE3_ASSOC);
    if($item['n']!=0) {
        header("location:../loginUI/register.html?v=0");
    }

    else {
        $ret = $db->exec($sql2);
        $db->close();
        $url = "../loginUI/login.html";
        echo "<script>
                alert('注册成功!');
                location.href='" . $url . "';
          </script>";
    }
?>

