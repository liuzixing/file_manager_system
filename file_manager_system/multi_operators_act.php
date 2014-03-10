<?php
include("config.inc.php");
include("./class/tb_files.class.php");
include("./class/tb_folder.class.php");

if (sizeof($_POST) <= 3){
	errorback("选中文件个数为0");
}

if (isset($_POST["b1"])){
	check_post("cname", "文件夹名不能为空");

	if (!$tb_folder->insert($CID, $_POST["cname"])){
		errorback("创建文件夹失败");
	}
	$rss = query("select last_insert_id() as cid", $conn);
	$tb_folder_id = $rss[0]["cid"];

	foreach ($_POST as $key => $value) {
		$ss = explode("_", $key);
		if (sizeof($ss) <= 1){
			continue;
		}

		$tb_files->set_folder($tb_folder_id, $value, $CID);
	}

	redirect("创建文件夹成功", "./file_list.php");
}else{
	check_post("folder_id", "请选择目标文件夹");

	$tb_folder_id = $_POST["folder_id"];

	if ($tb_folder_id == -1){
		errorback("请选择目标文件夹");
	}
	foreach ($_POST as $key => $value) {
		$ss = explode("_", $key);
		if (sizeof($ss) <= 1){
			continue;
		}

		$tb_files->set_folder($tb_folder_id, $value, $CID);
	}

	redirect("添加文件成功", "./file_list.php");
}

?>