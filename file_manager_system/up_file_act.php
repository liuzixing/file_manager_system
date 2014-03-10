<?php 
include("./config.inc.php");
include("./class/tb_files.class.php");

$hits[UPLOAD_ERR_NO_FILE] = "请选择文件";
$hits[UPLOAD_ERR_INI_SIZE] = "文件超过限制大小";
$hits[UPLOAD_ERR_FORM_SIZE] = "请选择文件";

$err = $_FILES["UP_FILE"]["error"];
if ($err != 0){
	if (isset($hits[$err]))
		redirect($hits[$err], "./up_file.php");
	else
		redirect("上传有错误", "./up_file.php");
}


$ctype = explode(".", $_FILES["UP_FILE"]["name"]);
$ctype = $ctype[sizeof($ctype) - 1];
$ctype = strtolower($ctype);
$ctype = get_type_code($ctype);
$corg_file_name = $_FILES["UP_FILE"]["name"];
$cguid_file_name = get_GUID();
$cdir = mt_rand(1,50000);

$path = "./files/" . $cdir;

if (!file_exists($path)){
	if (!mkdir($path)){
		errorback("上传有错误");
	}
}

if (!move_uploaded_file($_FILES["UP_FILE"]["tmp_name"], $path . "/" . $cguid_file_name)){
	unlink($_FILES["UP_FILE"]["tmp_name"]);
	errorback("上传有错误");
}

$ret = $tb_files->insert($CID, $corg_file_name, $cguid_file_name, $ctype, $cdir);

if ($ret){
	$chits = "成功上传";
	redirect($chits, "./file_list.php");
}else{
	$chits = "上传有错误";
	errorback($chits);
}


?>