<?php
include("config.inc.php");
include("./class/tb_files.class.php");
include("./class/tb_folder.class.php");
check_get("cid");

#echo($_GET["cid"]);
$tb_files->set_all_no_folder($_GET["cid"], $CID);
if ($tb_folder->delete($CID, $_GET["cid"])){
	redirect("删除文件夹成功", "./file_list.php");
}else{
	errorback("删除文件夹失败");
}


?>