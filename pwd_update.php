<script type="text/javascript" src="js.js">

</script>
<?php
include_once 'config.php';
mysqli_set_charset($link,'utf8');
$password = $_SESSION['pwd'];
$sql = "select * from admin where password='$password'";
$sj = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($sj);
$submit = isset($_POST['submit'])?$_POST['submit']:"";
if ($submit){
    if ($row['password']==$_POST['password']){
        $password2 = $_POST['password2'];
        $sql = "update admin set password='$password2' where id=1";//因为是管理员，所以id为1
        mysqli_query($link,$sql);
        echo "<script type='text/javascript'>alert('修改成功，请重新登录！');window.location='login.php';</script>";
        exit();
    }else
        ?>
    <?php {
        ?>
        <script type="text/javascript">
            alert('原始密码不正确，请重新输入');
            location.href='pwd_update.php';
        </script>
        <?php
    }
}
?>
<table cellpadding="3" cellspacing="1" border="0" width="100%" class="table" align="center">
    <form name="frm" method="post" action="">
        <tr>
            <th height="25" colspan="4" align="center" class="bg_tr">更改管理员密码</th>
        </tr>
        <tr>
            <td width="40%" align="right" class="td_bg">用户名：</td>
            <td width="60%" class="td_bg">
                <?php echo $_SESSION['admin'];?>
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">原密码：</td>
            <td class="td_bg">
                <input type="password" name="password" id="password" size="20">
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">新密码：</td>
            <td class="td_bg">
                <input type="password" name="password1" id="password1" size="20">
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">确认密码：</td>
            <td class="td_bg">
                <input type="password" name="password2" id="password2" size="20">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" class="td_bg">
                <input type="submit" class="button" onclick="return check()" name="submit" value="确定更改">
            </td>
        </tr>
    </form>
</table>

