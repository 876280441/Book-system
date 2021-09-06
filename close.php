<?php
session_start();
if (isset($_SESSION['admin'])){
    session_unset();
    session_destroy();//销毁一个会话中的全部数据
    setcookie(session_name(),'');//销毁与客户端的联系
    echo "<script type='text/javascript'>alert('注销成功!');location.href='login.php'</script>";
}else{
    echo "<script type='text/javascript'>alert('注销失败');location.href='admin_index.php'</script>";
}
?>
