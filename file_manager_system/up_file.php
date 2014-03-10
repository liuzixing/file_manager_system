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
        <tr>
            <td colspan = "4">
                <a href = "index.php">返回</a>
            </td>
        </tr>
        <form action = "up_file_act.php" method = "post" enctype="multipart/form-data">
            <tr class="tr_css">
                <td><input type = "file" name = "UP_FILE"/></td>
            </tr>
            <tr>
                <td><input type = "submit" value = "上传"/></td>
            </tr>
        </form>
    </table>
</body>
</html>