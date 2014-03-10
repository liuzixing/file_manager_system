<?php
include("config.inc.php");
include("./class/tb_files.class.php");
check_get("cid");

if ($tb_files->set_folder(0, $_GET["cid"], $CID)){
	redirect("移出文件夹成功", "./file_list.php");
}else{
	errorback("移出文件夹失败");
}


?>