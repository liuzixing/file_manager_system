<?php
include("./function.inc.php");

include("./list.inc.php");

$CUSERNAME = decode_val($_COOKIE["A"]);
$CID = decode_val($_COOKIE["B"]);
$KEY = decode_val($_COOKIE["C"]);

only_login($KEY, $CID, $CUSERNAME);

set_cookies($CUSERNAME, $CID);

header("Cache-Control: no-cache, must-revalidate");
header("Content-Type:text/html;charset=utf-8");


$conn = get_conn($db[0]['host'],$db[0]['username'],$db[0]['passwd'],$db[0]['db_name']);

?>
