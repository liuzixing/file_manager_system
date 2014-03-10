<?php
include("./list.inc.php");

class tb_folder{
	var $rs;
	var $conn;
	var $table;

	function tb_folder(){
		$this->table = "tb_folder";
		global $ls;
		$this->ls = $ls;
	}

	function set_conn($conn){
		$this->conn = $conn;
	}

	
	function insert($tb_user_cid, $cname){
		$sql = "insert into tb_folder (tb_user_cid, cname, cdate) values ('$tb_user_cid', '$cname', now())";
		#die($sql);
		return update($sql, $this->conn);
	}

	function select($tb_user_cid){
		$sql = "select * from tb_folder where tb_user_cid = '$tb_user_cid'";
		#die($sql);
		return query($sql, $this->conn);
	}

	function delete($tb_user_cid, $cid){
		$sql = "delete from tb_folder where cid = '$cid' and tb_user_cid = '$tb_user_cid'";
		return update($sql, $this->conn);
	}

}
$tb_folder = new tb_folder();
$tb_folder->set_conn($conn);

?>
