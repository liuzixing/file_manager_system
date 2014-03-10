<?php
include("config.inc.php");
include("./class/tb_files.class.php");
check_get("cid", "删除失败");

if ($tb_files->delete($CID, $_GET["cid"])) {
	redirect("删除成功", "file_list.php");
}else{
	errorback("删除失败");
}
?>