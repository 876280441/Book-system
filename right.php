<table>
    <tr>
        <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <span>软件版本</span>
                        </div>
                    </td>
                    <td height="20" align="center" bgcolor="#FFFFFF">SS3.3</td>
                </tr>
                <tr>
                    <td width="23%" height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <span>php版本</span>
                        </div>
                    </td>
                    <td width="77%" height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <?php echo "PHP".PHP_VERSION;?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <span>服务器名：</span>
                        </div>
                    </td>
                    <td height="20" align="center" bgcolor="#FFFFFF">
                        <div align="center">
                            <?php echo $_SERVER['SERVER_NAME']?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <span>服务器ip：</span>
                        </div>
                    </td>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <?php echo $_SERVER['HTTP_HOST'];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <span>服务器端口：</span>
                        </div>
                    </td>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <?php echo $_SERVER['SERVER_PORT'];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <span>服务器时间：</span>
                        </div>
                    </td>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <?php echo $showtime=date("Y-m-d H:i:s");?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <span>服务器操作系统：</span>
                        </div>
                    </td>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <?php echo PHP_OS;?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <span>站点物理路径：</span>
                        </div>
                    </td>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <?php echo $_SERVER['DOCUMENT_ROOT'];?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <span>
                                <?php echo  $_SESSION['admin']?>
                            </span>
                        </div>
                    </td>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            系统管理员
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <span>在线使用帮助</span>
                        </div>
                    </td>
                    <td  height="20" align="left" bgcolor="#FFFFFF">
                        <div align="center">
                            <a href="#">查看在线帮助文档</a>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
