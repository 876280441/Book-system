<?php
include_once 'config.php';
include_once 'page.inc.php';
$pagesize = 8;//规定每页显示数
$id = 1;//设置首页
$sql = "select * from yx_book";
$sj = mysqli_query($link, $sql);
$yx = mysqli_num_rows($sj);//返回结果集中行的数目，这个命令只对select语句有效
$pagecount = ($yx - 1) / $pagesize + 1;//计算总页数
$pagecount = (int)$pagecount;//强制转换
$pageno = $_GET['id'];//获取当前页
if ($pageno == "") {
    $pageno = 1;//当前页为空时显示第一页
}
if ($pageno < 1) {
    $pageno = 1;//当前页小于第一页时显示第一页
}
if ($pageno > $pagecount) {
    //当前页数大于总页数时显示总页数
    $pageno = $pagecount;
}
$startno = ($pageno - 1) * $pagesize;//每页从第几条数据开始显示
$sql = "select * from  yx_book order by id desc limit {$startno},{$pagesize}";
$sj = mysqli_query($link, $sql);
?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table">
    <tr>
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr" style="background-color: #e6e6e6">
            <a href="admin_index.php">后台管理</a>
            &gt;&gt;新书管理
        </td>
    </tr>
    <tr>
        <th width="6%" height="35" align="center" bgcolor="#FFFFFF">ID</th>
        <th width="25%" align="center" bgcolor="#FFFFFF">书名</th>
        <th width="11%" align="center" bgcolor="#FFFFFF">价格</th>
        <th width="16%" align="center" bgcolor="#FFFFFF">入库时间</th>
        <th width="11%" align="center" bgcolor="#FFFFFF">类别</th>
        <th width="11%" align="center" bgcolor="#FFFFFF">入库总量</th>
        <th width="20%" align="center" bgcolor="#FFFFFF">操作</th>
    </tr>
    <tr>
        <?php
        while ($rows = mysqli_fetch_assoc($sj))
        {
        ?>
    <tr align="center">
        <td class="td_bg" width="6%"><?php echo $rows["id"] ?></td>
        <td class="td_bg" width="25%" height="26"><?php echo $rows["name"] ?></td>
        <td class="td_bg" width="11%" height="26"><?php echo $rows["price"] ?></td>
        <td class="td_bg" width="16%" height="26"><?php echo $rows["uploadtime"] ?></td>
        <td width="11%" height="26" class="td_bg"><?php echo $rows["type"] ?></td>
        <td width="11%" height="26" class="td_bg"><?php echo $rows["total"] ?></td>
        <td class="td_bg" width="20%">
            <a href="update.php?id=<?php echo $rows['id'] ?>" class="trlink">修改</a>
            <a href="del.php?id=<?php echo $rows['id'] ?>" class="trlink">删除</a>
        </td>
    </tr>
    <?php
    }
    ?>
    </tr>
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

</table>
