<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>图书管理系统新书添加</title>
</head>
<body>
<table width="100%" height="173px" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
    <tr>
        <td colspan="2" align="left" class="bg_tr">
            <a href="admin_index.php">后台管理</a>
            &gt;&gt;新书添加
        </td>
    </tr>
    <tr>
        <td height="27" valign="top" bgcolor="#FFFFFF">
            <form action="" id="form1" name="form1" method="post" style="margin: 0px;padding:0px;">
                <table width="45%" height="42" bgcolor="0" align="center" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="36%" align="center">
                            <select name="seltype" id="seltype">
                                <option value="id">图书序号</option>
                                <option value="name">图书名称</option>
                                <option value="price">图书价格</option>
                                <option value="time">入库时间</option>
                                <option value="type">图书类别</option>
                            </select>
                        </td>
                        <td width="31%" align="center">
                            <input type="text" name="coun" id="coun">
                        </td>
                        <td width="33%" align="center">
                            <input type="submit" name="button" id="button" value="查询">
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <th width="7%" height="35" align="center" bgcolor="#FFFFFF">ID</th>
        <th width="28%" align="center" bgcolor="#FFFFFF">书名</th>
        <th width="12%" align="center" bgcolor="#FFFFFF">价格</th>
        <th width="24%" align="center" bgcolor="#FFFFFF">入库时间</th>
        <th width="12%" align="center" bgcolor="#FFFFFF">类别</th>
        <th width="24%" align="center" bgcolor="#FFFFFF">操作</th>
    </tr>
    <?php
    include_once 'config.php';
    if (isset($_POST['button'])) {
        $pagesize = 8;//规定每页显示数
        $sql = "select * from yx_book where " . $_POST['seltype'] . " like ('%" . $_POST['coun'] . "%')";
        $sj = @mysqli_query($link, $sql) or die("请输入查询条件！！！");
        $yx = @mysqli_num_rows($sj);//返回结果集中行的数目，这个命令只对select语句有效
        $pagecount = ($yx - 1) / $pagesize + 1;//计算总页数
        $pagecount = (int)$pagecount;//强制转换
        $pageno = @$_GET['pageno'];//获取当前页
        if ($pageno == "") {
            $pageno = 1;   //当前页为空时显示第一页
        }
        if ($pageno < 1) {
            $pageno = 1;  //当前页小于第一页时显示第一页
        }
        if ($pageno > $pagecount) {
            $pageno = $pagecount;  //当前页数大于总页数时显示总页数
        }
        $startno = ($pageno - 1) * $pagesize;//每页从第几条数据开始显示
        $sql = "select * from yx_book  where " . $_POST['seltype'] . " like ('%" . $_POST['coun'] . "%') order by id desc limit {$startno},{$pagesize}";
        $sj = @mysqli_query($link, $sql);
        while ($rows = @mysqli_fetch_assoc($sj)) {
            ?>
            <tr align="center">
                <td width="7%"><?php echo $rows['id'] ?></td>
                <td width="28%" height="26"><?php echo $rows['name'] ?></td>
                <td width="12%" height="26"><?php echo $rows['price'] ?></td>
                <!--        <td width="24%" height="26">--><?php //echo $rows['uptime']
                ?><!--</td>-->
                <td width="12%" height="26"><?php echo $rows['type'] ?></td>
                <td width="24%">
                    <a href="update.php?id=<?php echo $rows['id'] ?>">修改</a>
                    <a href="delete.php?id=<?php echo $rows['id'] ?>">删除</a>
                </td>
            </tr>
        <?php }
        ?>
        <tr>
            <th height="25" colspan="7" align="center" class="bg_tr">
                <?php
                if ($pageno == 1) {
                    ?>
                    首页 | 上一页 | <a href="?id=<?php echo $pageno + 1 ?>">下一页</a> |
                    <a href="?id=<?php echo $pagecount ?>">末页</a>
                    <?php
                } else if ($pageno == $pagecount) {
                    ?>
                    <a href="?id=<?php echo $id ?>">首页</a> |
                    <a href="?id=<?php echo $pageno - 1 ?>">上一页</a> | 下一页 | 末页
                    <?php
                } else {
                    ?>
                    <a href="?id=<?php echo $id ?>">首页</a> |
                    <a href="?id=<?php echo $pageno - 1 ?>">上一页</a> |
                    <a href="?id=<?php echo $pageno + 1 ?>" class="forumRowHighlight">下一页</a> |
                    <a href="?id=<?php echo $pagecount ?>">末页</a>
                    <?php
                }
                ?>
                页次：<?php echo $pageno ?>/<?php echo $pagecount ?>页 共有<?php echo $yx ?>条信息
            </th>
        </tr>
    <?php } ?>
</table>

</body>
