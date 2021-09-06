<?php
include_once 'config.php';
$sql = "delete from message where id='".$_GET['id']."'";
$sj = mysqli_query($link,$sql);
if ($sj){
    echo  "<script type='text/javascript'>alert('删除成功');location='content.php';</script>";
}else{
    echo "删除失败";
}
