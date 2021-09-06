<?php
/*
 * session 变量用于存储关于用户会话（session）的信息，或者更改用户会话（session）的设置。

存储和取回 session 变量的正确方法是使用 PHP $_SESSION 变量，把输入的登录信息与session中存储的信息相匹配，匹配成功则完成登录。
 */
include_once 'config.php';
mysqli_set_charset($link,'utf8');
if (@$_POST['submit']){
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $code = $_POST['code'];
    if ($code<>$_SESSION['auth']){
        echo  "<script language='javascript'>alert('验证码不正确！');window.location='login.php'</script>";
        ?>
        <?php
        die();
    }
    $sql = "select * from admin where username='$username' and password='$pwd'";
    $rs = mysqli_query($link,$sql);
    if (mysqli_num_rows($rs)==1){
        $_SESSION['pwd']=$_POST['pwd'];
        $_SESSION['admin']=$_POST['username'];
        echo  "<script language='javascript'>alert('登录成功');
window.location='admin_index.php'</script>";
    }else{
        echo  "<script language='javascript'>alert('用户名或命名错误！');window.location='login.php'</script>";
        ?>
        <?php
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>广南职图书管理系统登录页面</title>
    <link rel="stylesheet" href="css/css.css" type="text/css">
    <style type="text/css">
        .submit:hover{
            color: red;
            font-size: 25px;
        }
    </style>
</head>
<body background="img/1.jpg">
<form id="frm" name="frm" method="post" action="" onsubmit="return check()">
    <h1>管理员登录页面</h1>
    <table>
        <tr>
            <td style="font-size: 16px">用户名：</td>
            <td>
                <input type="text" name="username" id="username">
            </td>
        </tr>
        <tr>
            <td>密码：</td>
            <td>
                <input type="password" name="pwd" id="pwd">
            </td>
        </tr>
        <tr>
            <td>验证码:</td>
            <td>
                <input type="text" name="code" id="code">
            </td>
            <td>
                <img src="verify.php" style="vertical-align:middle">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="登录" id="submit" class="submit">
            </td>
            <td>
                <input type="reset" name="reset" value="重置">
            </td>
        </tr>
    </table>
</form>
</body>
</html>