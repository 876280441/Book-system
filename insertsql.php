<?php
include_once 'config.php';
if ($_POST['action'] == 'insert') {
    $sql = "INSERT INTO yx_book (id,name,price,uploadtime,type,leave_number)
 values('" . $_POST['id'] . "','" . $_POST['name'] . "','" . $_POST['price'] . "','" . $_POST['uptime'] . "','" . $_POST['type'] . "','" . $_POST['leave_number'] . "')";
    $sj = mysqli_query($link, $sql);
    if ($sj) {
        echo "<script> alert('添加成功');location='content.php?id=1';</script>";
    } else {
        echo "<script>alert('添加失败');history.go(-1);</script>";
    }
}
