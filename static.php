<table width="100%" border="1" align="center" cellspacing="0" cellpadding="1" bgcolor="#CCCCCC">
    <tr>
        <td height="27" colspan="2" align="left" bgcolor="#FFFFFF">
            <a href="admin_index.php">后台管理</a>
            &gt;&gt;图书统计
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFF" height="27">图书类别</td>
        <td align="center" bgcolor="#FFFFF">库内图书</td>
    </tr>
    <?php
    include_once 'config.php';
    $sql = "select type,count(*) from yx_book group by type";
    $val = mysqli_query($link,$sql);
    while($arr = mysqli_fetch_row($val)){
    ?>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><?php echo $arr[0]?></td>
            <td align="center" bgcolor="#FFFFFF">本类目共有:<span style="color: red"><?php echo $arr[1]?></span>种</td>
        </tr>
    <?php }?>
    <tr>
        <?php $sql = "select id,count(*) from yx_book group by id" ;
        $rs = mysqli_query($link,$sql);
        $con = mysqli_num_rows($rs);
        ?>
        <td colspan="2" align="center" style="padding-left: 550px">
            共有<span style="color: darkred;"><?php echo $con;?></span>本图书

        </td>
    </tr>
</table>
