<?php
    require("sqlite.php");
    $db = new MyDB();
    $name = $_POST["id"];
    $psw = $_POST["psw"];
    $nickname = $_POST["nickname"];
    $configpsw = $_POST["configpsw"];
    $gender = $_POST["gender"];
    $sql =<<<EOF
          INSERT INTO user (id,psw,nickname,gender)
          VALUES ($name,$psw,'$nickname','$gender');
EOF;

    $ret = $db->exec($sql);
    $db->close();
    $url = "../loginUI/login.html";
    echo "<script>
                alert('注册成功!');
                location.href='".$url."';
          </script>";
?>

