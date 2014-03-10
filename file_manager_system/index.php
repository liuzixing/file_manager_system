<?php

include("config.inc.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" charset="utf-8" content="text/html" />
    <title>文件管理系统</title>
    <link rel="stylesheet" type="text/css" href="table.css" />
</head>

<body>
<div class="title">
    <h1>文件管理系统</h1>
</div>
    <table width="90%" id="mytab"  border="1" class="tab_css_1">
        <thead>
            <th width="100%">你好<?=$CUSERNAME?></th>
        </thead>
        <form action = "login_act.php" method = "post">
            <tr class="tr_css">
                <td><a href = "./file_list.php">文件列表</a></td>
            </tr>
            <tr>
                <td><a href = "./up_file.php">上传文件</a></td>
            </tr>
            <tr>
                <td><a href = "./login_out_act.php">登出</a></td>
            </tr>
        </form>
    </table>
</body>
</html>