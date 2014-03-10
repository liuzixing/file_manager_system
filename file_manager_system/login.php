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
            <th width="100%" colspan = "2">登录</th>
        </thead>
        <form action = "login_act.php" method = "post">
            <tr class="tr_css">
                <td>用户名:</td>
                <td><input type = "text" name = "username"/></td>
            </tr>
            <tr>
                <td>密码:</td>
                <td><input type = "password" name = "password"/></td>
            </tr>
            <tr class="tr_css">
                <td><a href = "registor.php">注册</a></td>
                <td><input type = "submit" value = "登录"/></td>
            </tr>
        </form>
    </table>
</body>
</html>