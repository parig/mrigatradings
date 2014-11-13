<?php	ob_start();

	$server_name ="localhost";
	 
	$db_name ="mrigatradings";
	$db_uname="root";	
	$db_pass="";	
	$db_prefix="mk_";
	define("CONSTANT", "mk_");
	
	$con=mysql_connect($server_name,$db_uname,$db_pass) or die(mysql_error());
	mysql_select_db($db_name,$con) or die(mysql_error());
?>