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
        if (theForm.total.value == ""){
            alert("请输入书的库总量.");
            theForm.type.focus();
            return false;
        }
        return true;
    }
</script>
<?php
include_once 'config.php';
if (@$_POST['action']=='insert'){
//    $sql = "INSERT INTO yx_book(id,name,price,type,total,leave_number)
//          values({$_POST['id']},'{$_POST["name"]}',{$_POST['price']},'{$_POST["type"]}',{$_POST['total']},{$_POST['leave_number']} )";
//    $sj = mysqli_query($link,$sql);
    $sql = "INSERT INTO yx_book (id,name,price,type,total,leave_number)
          values('".$_POST['id']."','".$_POST['name']."','".$_POST['price']."','".$_POST['type']."','".$_POST['total']."','".$_POST['leave_number']."')";
    $sj = mysqli_query($link,$sql);
    if ($sj){
        echo "<script> alert('添加成功');location='content.php?id=1';</script>";
    } else{
        echo "<script>alert('添加失败');history.go(-1);</script>";
    }
}
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>图书管理系统新书添加</title>
</head>
<body>
<form action="" id="myform" name="myform" method="post" onsubmit="return myform_Validator(this)">
    <table width="100%" height="173px" border="0" align="center" cellpadding="2" cellspacing="1" class="table" >
        <tr>
            <td colspan="2" align="left" class="bg_tr">
                <a href="admin_index.php">后台管理</a>
                &gt;&gt;新书添加
            </td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">id：</td>
            <td width="69%" class="td_bg">
                <input type="text" name="id" id="id" value="" size="18" maxlength="30">
            </td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">书名：</td>
            <td width="69%" class="td_bg">
                <input type="text" name="name" id="name" size="18" maxlength="30">
            </td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">价格：</td>
            <td width="69%" class="td_bg">
                <input type="text" name="price" id="price" size="18" maxlength="15">
            </td>
        </tr>
<!--        <tr>-->
<!--            <td width="31%" align="right" class="td_bg">入库时间：</td>-->
<!--            <td width="69%" class="td_bg">-->
<!--                <input type="text" name="uptime" id="uptime" value="--><?php //echo date('Y-m-d H:i:s')?><!--" size="18" maxlength="40" >-->
<!--            </td>-->
<!--        </tr>-->
        <tr>
            <td width="31%" align="right" class="td_bg">所属类别：</td>
            <td width="69%" class="td_bg">
                <input type="text" name="type" id="type"  size="18" maxlength="30">
            </td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">入库总量：</td>
            <td width="69%" class="td_bg">
                <input type="text" name="total" id="total"  size="18" maxlength="30">本
            </td>
        </tr>
        <tr>
            <td width="31%" align="right" class="td_bg">出库总量：</td>
            <td width="69%" class="td_bg">
                <input type="text" name="leave_number" id="leave_number"  size="18" maxlength="30">本
            </td>
        </tr>
        <tr>
            <td align="right" class="td_bg">
                <input type="hidden" name="action" value="insert" id="action">
                <input type="submit" name="submit" id="submit" value="添加">
            </td>
            <td class="td_bg">
                <input type="reset" id="reset" name="reset" value="重置">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
