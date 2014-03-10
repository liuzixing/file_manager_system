<?php
include("./list.inc.php");

class tb_user{
	var $rs;
	var $conn;
	var $table;

	function tb_user(){
		$this->table = "tb_user";
		global $ls;
		$this->ls = $ls;
	}

	function set_conn($conn){
		$this->conn = $conn;
	}

	
	function insert($cusername, $cpassword, $cemail){
		$sql = "insert into tb_user (cusername, cpassword, cemail, cdate) values ('$cusername', '$cpassword', '$cemail', now())";
		return update($sql, $this->conn);
	}

	function select($cusername){
		$sql = "select * from tb_user where cusername = '$cusername'";
		// die($sql);
		return query($sql, $this->conn);
	}

}
$tb_user = new tb_user();
$tb_user->set_conn($conn);

?>
