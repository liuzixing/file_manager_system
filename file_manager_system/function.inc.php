<?php

define("ENCODEKEY", "jz12@54^&");

function keyED($txt,$encrypt_key){       
	$encrypt_key = md5($encrypt_key);
	$ctr=0;       
	$tmp = "";       
	for($i=0;$i<strlen($txt);$i++){           
		if ($ctr==strlen($encrypt_key))
		  $ctr=0;           
		$tmp.= substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1);
		$ctr++;       
	}       
	return $tmp;   
}

function encrypt($txt,$key){
	$encrypt_key = md5(mt_rand(0,100));
	$ctr=0;       
	$tmp = "";      
	for ($i=0;$i<strlen($txt);$i++)       
	{
		if ($ctr==strlen($encrypt_key)) 
		  $ctr=0;           
		$tmp.=substr($encrypt_key,$ctr,1) . (substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1));
		$ctr++;       
	}       
	return keyED($tmp,$key); 
}

function decrypt($txt,$key){       
	$txt = keyED($txt,$key);       
	$tmp = "";       
	for($i=0;$i<strlen($txt);$i++)       
	{           
		$md5 = substr($txt,$i,1);
		$i++;           
		$tmp.= (substr($txt,$i,1) ^ $md5);       
	}       
	return $tmp;
}


function encode_val($val){
	return base64_encode(encrypt($val, ENCODEKEY));
}

function decode_val($val){
	$val = base64_decode($val);
	return decrypt($val, ENCODEKEY);
}

function encode_url($url,$key=ENCODEKEY){
	return rawurlencode(base64_encode(encrypt($url,$key)));
}

function decode_url($url,$key=ENCODEKEY){
	return decrypt(base64_decode(rawurldecode($url)),$key);
}


function redirect($error_message, $url="./login.php"){
	echo ("<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">");
	echo ("<Meta HTTP-EQUIV=\"refresh\" content=\"1; url=$url\">");
	echo ("</head><body>");
	echo "<p><font color=\"#FF0000\"><strong>".$error_message."</strong></font></p>";
	echo "马上进入另一个页面...\n</body></html>";
	exit;
}

function errorback($error_message,$url="0"){
	//global  $abc;
	echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n<script>\n");
	if($error_message!="0")echo("alert('提示:".$error_message."');\n");
	if($url=="0"){
		echo("history.back();\n");
	}else{
		//echo("alert('aaaa');");
		echo("window.location=\"./login.php\";\n");
	}
	echo("</script>\n");
	exit;
}

function query($sql,$conn){
	// if(!$rss=mysql_query($sql,$conn)){
	// 	die ("错误");
	// };

	$rss=mysql_query($sql,$conn);

	if ($rss){
		while ($rs = mysql_fetch_array($rss, true))
			$ret[] = $rs;
	}

	return $ret;
}

function update($sql,$conn){
	$result=mysql_query($sql,$conn);
	if(mysql_affected_rows($conn)<1){
		return FALSE;
	}else{
		return TRUE;
	}
}

function mysql_matched_rows() {
   $_kaBoom=explode(' ',mysql_info());
   if (count($_kaBoom) < 3)
	{	
		return 1;
	}
   return $_kaBoom[2];
}

function get_conn($host,$username,$passwd,$db_name){

	if(!$conn=mysql_connect($host,$username,$passwd, TRUE)){
		echo "数据库链接创建失败";
		exit;
	};
	if(!mysql_select_db($db_name, $conn)){
		echo ($db_name."数据源选择失败！\n");
		exit;
	}
	mysql_query("set names utf8mb4;",$conn);
	return $conn;
}

function get_GUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}

function check_post($val, $msg = "失败"){
	global $_POST;

	if ($_POST[$val] == ""){
		errorback($msg);
	}
}

function check_get($val, $msg = "失败"){
	global $_GET;

	if ($_GET[$val] == ""){
		errorback($msg);
	}
}


function only_login($key, $cid, $cusername){
	$arr = explode("\"", $key);
	$msg = "请先登录";
	$b = false;
	if ($arr[0] != "F"){
		$b = true;
	}
	if ($arr[1] != $cusername){
		$b = true;
	}
	if ($arr[2] != "L"){
		$b = true;
	}
	if ($arr[3] != $cid){
		$b = true;
	}
	if ($arr[4] != "S"){
		$b = true;
	}

	if ($b){
		redirect($msg);
	}
}

function passwd_md5($password){
	$ret = "";
	$keys = "@Tf4u287%GFu9()#*kjczxq";
	$klen = strlen($keys);
	$i = -1;
	foreach($password as $ch){
		++$i;
		$i %= $klen;
		$ret .= $ch . $keys[$i];
	}

	return md5($ret);
}

function _get_type_list(){
	$type_list["unknow"] = 0;

	$type_list["txt"] = 1;
	$type_list["doc"] = 2;
	$type_list["xls"] = 3;
	$type_list["docx"] = 4;
	$type_list["ppt"] = 5;
	$type_list["pptx"] = 6;
	$type_list["psd"] = 7;
	$type_list["pdf"] = 8;
	$type_list["xlsx"] = 9;
	$type_list["ini"] = 10;

	$type_list["gif"] = 20;
	$type_list["jpg"] = 21;
	$type_list["jpeg"] = 22;
	$type_list["bmp"] = 23;

	$type_list["7z"] = 40;
	$type_list["rar"] = 41;
	$type_list["zip"] = 42;
	$type_list["gz"] = 43;
	$type_list["bz2"] = 44;
	$type_list["tar"] = 45;

	$type_list["php"] = 60;
	$type_list["java"] = 61;
	$type_list["cpp"] = 62;
	$type_list["cc"] = 62;
	$type_list["js"] = 64;
	$type_list["css"] = 65;
	$type_list["htm"] = 66;
	$type_list["html"] = 67;
	$type_list["c"] = 68;

	$type_list["mkv"] = 80;
	$type_list["exe"] = 81;
	$type_list["flv"] = 82;
	$type_list["mp4"] = 83;
	$type_list["mp3"] = 84;
	$type_list["rmvb"] = 85;

	return $type_list;

}

function get_type_code($type){
	
	$type_list = _get_type_list();	

	if (!isset($type_list[$type])){
		$type = $type_list["unknow"];
	}else{
		$type = $type_list[$type];
	}

	return $type;
}

function _type_change($type){
	$t["htm"] = "html";
	$t["jpeg"] = "jpg";
	$t["gz"] = "unknow";
	$t["tar"] = "unknow";
	$t["bz2"] = "unknow";

	$t["php"] = "unknow";
	$t["cpp"] = "unknow";
	$t["cc"] = "unknow";
	$t["js"] = "unknow";
	$t["css"] = "unknow";
	$t["c"] = "unknow";
	if (isset($t[$type])) {
		return $t[$type];
	}
	return $type;
}

function find_type($code){
	$type_list = _get_type_list();
	foreach ($type_list as $key => $value) {
		if ($code == $value){
			$type = $key;
			break;
		}
	}

	return _type_change($type);
}

function set_cookies($cusername, $cid){
	setcookie("A", encode_val($cusername), time()+3600, "/");
	setcookie("B", encode_val($cid), time()+3600, "/");
	$key = encode_val("F\"" . $cusername . "\"L\"" . $cid . "\"S");
	setcookie("C", $key, time()+3600, "/");
}

function clean_cookie(){
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for ($i = 0; $i < 26; ++$i) {
		setcookie($str[$i], "", 0, "/");
	}
}
?>