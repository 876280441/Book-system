<script type="text/javascript">
    function myform_Validator(theForm) {
        if (theForm.name.value == ""){
            alert("请输入书名.");
            theForm.name.focus();
            return false;
        }
        if (theForm.price.value == ""){
            alert("请输入书价格.");
            theForm.price.focus();
            return false;
        }
        if (theForm.type.value == ""){
            alert("请输入书所属类别.");
            theForm.type.focus();
            return false;
        }
        return true;
    }
</script>
<?php
include_once 'config.php';
$id = $_GET['id'];
$sql = "select * from message where id='$id'";
$sj = mysqli_query($link,$sql);
$rows = mysqli_fetch_row($sj);
?>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>图书管理系统新书修改</title>
</head>
<body>
<form action="updatesql.php" id="myform" name="myform" method="post" onsubmit="return myform_Validator(this)">
    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
    <table width="100%" height="173px" border="0" align="center" cellpadding="2" cellspacing="1" class="table" >
        <tr>
            <td colspan="2" align="left" class="bg_tr">
                <a href="admin_index.php">后台管理</a>
                &gt;&gt;新书修改
            </td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">书名：</td>
            <td width="69%" class="td_bg">
                <input type="text" name="name" id="name" value="<?php echo $rows[1] ?>" size="18" maxlength="30">
            </td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">价格：</td>
            <td width="69%" class="td_bg">
                <input type="text" name="price" id="price" value="<?php echo $rows[2] ?>" size="18" maxlength="15">
            </td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">入库时间：</td>
            <td width="69%" class="td_bg">
                <input type="text" name="uptime" id="uptime" value="<?php echo $rows[3] ?>" size="18" maxlength="40">
            </td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">所属类别：</td>
            <td width="69%" class="td_bg">
                <input type="text" name="type" id="type" value="<?php echo $rows[4] ?>" size="18" maxlength="30">
            </td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">入库总量：</td>
            <td width="69%" class="td_bg">
                <input type="text" name="total" id="total" value="<?php echo $rows[5] ?>" size="18" maxlength="30">本
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">
                <input type="hidden" name="action" value="modify">
                <input type="submit" name="submit" id="submit" value="修改">
            </td>
            <td class="td_bg">
                <input type="reset" id="reset" name="reset" value="重置">
            </td>
        </tr>
    </table>
</form>
</body>
</html>