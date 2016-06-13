<?php
    require("sqlite.php");
    $title = $_POST['title'];
    $writer = $_POST['writer'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $id = $_COOKIE["user_id"];
    $sql='';
    $aid = rand(2100,100000);
    $db = new MyDB();

    if (isset($_FILES['file'])
        && is_uploaded_file($_FILES['file']['tmp_name'])) {
        $db = new MyDB();
        $imgFile = $_FILES['file'];
        $imgFileName = $imgFile['name'];
        $imgType = $imgFile['type'];
        $imgSize = $imgFile['size'];
        $imgTmpFile = $imgFile['tmp_name'];
        move_uploaded_file($imgTmpFile, 'upfile/'.$imgFileName);
        $name1 = "../loginPHP/".'upfile/'.$imgFileName;
        $sql = "insert into activity(aid,title,writer,summary,content,time,id,cover) VALUES ($aid,'$title','$writer','$summary','$content',time(),$id,'$name1')";
        $ret = $db->exec($sql);
        $sql = "insert into activity_user(aid,uid) VALUES ($aid,$id)";
        $ret = $db->exec($sql);
        echo "<script>alert('发布成功');location.href='../activityUI/deliver.html';</script>";
    }
    else {
        echo "<script>
                    alert('发布活动失败，请检查是否上传封面');
                    location.href='../activityUI/deliver.html';
            </script>";
}
?>