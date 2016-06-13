<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/4
 * Time: 15:15
 */
    require("sqlite.php");
    if (isset($_FILES['file1'])
        && is_uploaded_file($_FILES['file1']['tmp_name'])&&isset($_FILES['file2'])
        && is_uploaded_file($_FILES['file2']['tmp_name'])) {
        $db = new MyDB();
        $imgFile = $_FILES['file1'];
        $imgFileName = $imgFile['name'];
        $imgType = $imgFile['type'];
        $imgSize = $imgFile['size'];
        $imgTmpFile = $imgFile['tmp_name'];
        move_uploaded_file($imgTmpFile, 'auth/'.$imgFileName);
        $name1 = "../loginPHP/".'auth/'.$imgFileName;
        $imgFile = $_FILES['file2'];
        $imgFileName = $imgFile['name'];
        $imgType = $imgFile['type'];
        $imgSize = $imgFile['size'];
        $imgTmpFile = $imgFile['tmp_name'];
        move_uploaded_file($imgTmpFile, 'auth/'.$imgFileName);
        $name2 = "../loginPHP/".'auth/'.$imgFileName;
        $id = $_COOKIE["user_id"];
        $reason = $_POST['position'];
        $sql = "insert into auth(id,photo,license,reason) VALUES ($id,'$name1','$name2','$reason')";
        $ret = $db->exec($sql);
        echo "<script>alert('申请成功，请耐心等待结果');location.href='../defaultSetting/authManager.html';</script>";
    }
    else {
        echo "<script>
                    alert('申请认证失败，请检查是否上传图片');
                    location.href='../defaultSetting/authManager.html';
            </script>";
    }