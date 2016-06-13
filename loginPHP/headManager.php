<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/2
 * Time: 21:02
 */
require("sqlite.php");
if (isset($_FILES['file'])
    && is_uploaded_file($_FILES['file']['tmp_name']))
{
    $imgFile = $_FILES['file'];
    $imgFileName = $imgFile['name'];
    $imgType = $imgFile['type'];
    $imgSize = $imgFile['size'];
    $imgTmpFile = $imgFile['tmp_name'];
    move_uploaded_file($imgTmpFile, 'upfile/'.$imgFileName);
    $validType = false;
    $upRes = $imgFile['error'];
    if ($upRes == 0)
    {
        if ($imgType == 'image/jpeg'
            || $imgType == 'image/png'
            || $imgType == 'image/gif')
        {
            $validType = true;
        }
        if ($validType)
        {
            $strPrompt = sprintf("文件%s上传成功<br>"
                . "文件大小: %s字节<br>"
                . "<img src='upfile/%s'>"
                , $imgFileName, $imgSize, $imgFileName
            );
            echo $strPrompt;
        }
    }
    $db = new MyDB();
    $name = "../loginPHP/".'upfile/'.$imgFileName;
    $id = $_COOKIE["user_id"];
    $sql = "update user set head_pic='$name' WHERE id=$id";
    $ret = $db->exec($sql);
    header("location:../defaultSetting/headPic.html");
}
?>