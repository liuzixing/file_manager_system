<?php
include("./list.inc.php");

class tb_files{
	var $rs;
	var $conn;
	var $table;

	function tb_files(){
		$this->table = "tb_files";
		global $ls;
		$this->ls = $ls;
	}

	function set_conn($conn){
		$this->conn = $conn;
	}

	
	function insert($tb_user_cid, $corg_file_name, $cguid_file_name, $ctype, $cdir){
		$sql = "insert into tb_files (tb_user_cid, corg_file_name, cguid_file_name, ctype, cdir, cdate) values ('$tb_user_cid', '$corg_file_name', '$cguid_file_name', '$ctype', '$cdir', now())";
		return update($sql, $this->conn);
	}

	function set_folder($tb_folder_cid, $cid, $tb_user_cid){
		$sql = "update tb_files set tb_folder_cid = '$tb_folder_cid' where cid = '$cid' and tb_user_cid = '$tb_user_cid'";
		#die($sql);
		return update($sql, $this->conn);
	}

	function set_all_no_folder($tb_folder_cid, $tb_user_cid){
		$sql = "update tb_files set tb_folder_cid = 0 where tb_folder_cid = '$tb_folder_cid' and tb_user_cid = '$tb_user_cid'";
		#die($sql);
		return update($sql, $this->conn);
	}

	function select_nofolder($tb_user_cid){
		$sql = "select * from tb_files where tb_user_cid = '$tb_user_cid' and cstatus = 1 and tb_folder_cid = 0";
		// die($sql);
		return query($sql, $this->conn);
	}

	function select_byfolder($tb_folder_cid){
		$sql = "select * from tb_files where tb_folder_cid = '$tb_folder_cid'";
		// die($sql);
		return query($sql, $this->conn);
	}

	function delete($tb_user_cid, $cid){
		$sql = "update tb_files set cstatus = 0 where cid = '$cid' and tb_user_cid = '$tb_user_cid'";
		return update($sql, $this->conn);
	}

}
$tb_files = new tb_files();
$tb_files->set_conn($conn);

?>
