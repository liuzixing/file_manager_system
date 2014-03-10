<?php
include("./function.inc.php");
include("./list.inc.php");

$conn = get_conn($db[0]['host'],$db[0]['username'],$db[0]['passwd'],$db[0]['db_name']);
include("./class/tb_user.class.php");

check_post("username", "用户名不能为空");
check_post("password", "密码不能为空");

$cusername = trim($_POST["username"]);
$cpassword = $_POST["password"];

if ($cusername != mysql_real_escape_string($cusername)){
    errorback("用户名不存在");
}

$rss = $tb_user->select($cusername);

if (sizeof($rss) == 0){
    errorback("用户名不存在");
}

if ($rss[0]["cpassword"] != passwd_md5("SYS" . $cpassword . "FILE")){
    errorback("密码错误");
}

// if ($rss[0]["cstatus"] == 0){
//     errorback("你的用户尚未验证");
// }

set_cookies($cusername, $rss[0]["cid"]);

redirect("登录成功", "./index.php");
?>