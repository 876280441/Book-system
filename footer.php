<tr>
            <tr>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="24%"> </td>
                            <td width="10%" height="20" valign="bottom" class="STYLE1" style="text-align: center">管理菜单</td>
                            <td width="33%"> </td>
                        </tr>
                    </table>
                </td>
                    <?php
                    if ($_SESSION['admin']=='8762'){
                        $admin = "管理员";
                    }else{
                        $admin = "普通用户";
                    }
                    ?>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td height="20" valign="bottom"><span class="STYLE1">当前登录用户：
                                    <span style="color: red"><?php echo $_SESSION['admin'];?></span>

                                    <a href="close.php">注销</a>
                                    <br>用户角色：<?php echo $admin;?></span></td>
                            <td valign="bottom" class="STYLE1"><div align="right"></div></td>
                        </tr>
                    </table>
                </td>
            </tr>
