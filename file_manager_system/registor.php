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
            <th width="100%" colspan = "2">注册</th>
        </thead>
        <form action = "registor_act.php" method = "post">
            <tr class="tr_css">
                <td>用户名:</td>
                <td><input type = "text" name = "username"/></td>
            </tr>
            <tr>
                <td>密码:</td>
                <td><input type = "password" name = "password"/></td>
            </tr>
            <tr>
                <td>重复输入密码:</td>
                <td><input type = "password" name = "password2"/></td>
            </tr>
            <tr>
                <td>邮箱:</td>
                <td><input type = "text" name = "email"/></td>
            </tr>
            <tr class="tr_css">
                <td></td>
                <td><input type = "submit" name = "login" value = "注册"/></td>
            </tr>
        </form>
    </table>
</body>
</html>