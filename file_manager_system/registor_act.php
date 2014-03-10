<?php
include("./function.inc.php");
include("./list.inc.php");

check_post("username", "用户名不能为空");
check_post("password", "密码不能为空");
check_post("password2", "二次输入密码不能为空");
check_post("email", "邮箱不能为空");

$conn = get_conn($db[0]['host'],$db[0]['username'],$db[0]['passwd'],$db[0]['db_name']);
include("./class/tb_user.class.php");

$cusername = trim($_POST["username"]);
$cpassword = $_POST["password"];
$cpassword2 = $_POST["password2"];
$cemail = trim($_POST["email"]);

if (strlen($cusername) < 6){
	errorback("用户名不能少于6个字符");
}

if (strlen($cpassword) < 8){
	errorback("密码不能少于8个字符");
}

if (strlen($cusername) > 24){
	errorback("用户名不能超过24个字符");
}

if (strlen($cpassword) > 25){
	errorback("密码不能超过25个字符");
}

if ($cpassword != $cpassword2){
	errorback("两次密码不一样");
}

if ($cusername != mysql_real_escape_string($cusername)){
	errorback("用户名含有非法字符");
}

if ($cemail != mysql_real_escape_string($cemail)){
	errorback("邮箱含有非法字符");
}

if (!preg_match('/^([\w\.\_]{2,10})@(\w{1,}).([a-z]{2,4})$/', $cemail)){
	errorback("邮箱格式错误");
}

$cpassword = passwd_md5("SYS" . $cpassword . "FILE");
if ($tb_user->insert($cusername, $cpassword, $cemail)){
	redirect("注册成功", "./login.php");
}else{
	errorback("用户名重复");
}
?>