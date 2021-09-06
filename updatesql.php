<?php
include_once 'config.php';
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$uptime = $_POST['uptime'];
$type = $_POST['type'];
$total = $_POST['total'];
$sql = "select * from message where id='$id'";
$sj = mysqli_query($link,$sql);
$arr = mysqli_fetch_array($sj,MYSQLI_ASSOC);
$rows = mysqli_fetch_row($sj);
if ($_POST['action']=='modify'){
//    $sql = "update message set name as uname = '$name',price='$price',uploadtime='$uptime',type as types='$type',total='$total',id='$id'";
    $sql = "update message set name = '".$_POST['name']."', price = '".$_POST['price']."', uploadtime = '".$_POST['uptime']."', type = '".$_POST['type']."', total = '".$_POST['total']."' where id='".$_POST['id']."'";
    $arr = mysqli_query($link,$sql);
    if ($arr){
        echo "<script> alert('修改成功');location='content.php?id=1';</script>";
    } else{
        echo "<script>alert('修改失败');history.go(-1);</script>";
    }
}
?>
