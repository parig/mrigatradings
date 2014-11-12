<?php	ob_start();

	$server_name ="localhost";
	 
	$db_name ="mrigatra_db";
	$db_uname="mrigatra_db";	
	$db_pass="Mn{{IAQ}8^]O";	
	$db_prefix="mk_";
	define("CONSTANT", "mk_");
	
	$con=mysql_connect($server_name,$db_uname,$db_pass) or die(mysql_error());
	mysql_select_db($db_name,$con) or die(mysql_error());
?>