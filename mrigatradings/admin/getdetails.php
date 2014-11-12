<?php
function getuserdetails($user_id)
{
	$sql_userdetails=mysql_query("select * from users where user_id='".$user_id."'") or die(mysql_error());
	$rs_userdetails=mysql_fetch_array($sql_userdetails) or die(mysql_error());
	$username=$rs_userdetails['username'];
	return $username;
}
function catdetails($product_cat_id)
{
	
	$sql_cat=mysql_query("select * from product_categories   where product_cat_id='".$product_cat_id."'") or die(mysql_error());
	$rs_cat=mysql_fetch_array($sql_cat) or die(mysql_error());
	$rs_cat_cname=$rs_cat['product_cat_name'];
	return $rs_cat_cname;
}
function productdetails($product_id)
{
	
	$sql_reso=mysql_query("select * from products where product_id='".$product_id."'") or die(mysql_error());
	$rs_reso=mysql_fetch_array($sql_reso) or die(mysql_error());
	$rs_product_cname=$rs_reso['product_name'];
	return $rs_product_cname;
}

function citydetails($cityID)
{
	
	$sql_city=mysql_query("select * from cities where cityID='".$cityID."'") or die(mysql_error());
	$rs_city=mysql_fetch_array($sql_city) or die(mysql_error());
	$rs_city_cname=$rs_city['cityName'];
	return $rs_city_cname;
}


function resourceemail($resource_id)
{
	
	$sql_reso1=mysql_query("select * from resources where resource_id='".$resource_id."'") or die(mysql_error());
	$rs_reso1=mysql_fetch_array($sql_reso1) or die(mysql_error());
	$rs_reso_cname1=$rs_reso1['resource_mail'];
	return $rs_reso_cname1;
}


function yeardetails($fyear_id)
{
	
	$sql_year=mysql_query("select * from fyear   where fyear_id='".$fyear_id."'") or die(mysql_error());
	$rs_year=mysql_fetch_array($sql_year) or die(mysql_error());
	$rs_year_name=$rs_year['fyear'];
	return $rs_year_name;
}
function folderdetails($flid)
{
	
	$sql_folder=mysql_query("select * from folder   where flid='".$flid."'") or die(mysql_error());
	$rs_folder=mysql_fetch_array($sql_folder) or die(mysql_error());
	$rs_folder_name=$rs_folder['foldername'];
	return $rs_folder_name;
}
function getdept($dept_id)
{
	
	$sql_dept=mysql_query("select * from dept   where dept_id='".$dept_id."'") or die(mysql_error());
	$rs_dept=mysql_fetch_array($sql_dept) or die(mysql_error());
	$dept_name=$rs_dept['dept_name'];
	return $dept_name;
}
function gettr($tr_id)
{
	
	$sql_tr=mysql_query("select * from training   where tr_id='".$tr_id."'") or die(mysql_error());
	$rs_tr=mysql_fetch_array($sql_tr) or die(mysql_error());
	$tr_name=$rs_tr['tr_name'];
	return $tr_name;
}


function getreq1($req_id)
{
	 
	
	$sql_req=mysql_query("select * from request    where req_id='".$req_id."'") or die(mysql_error());
	$rs_req=mysql_fetch_array($sql_req) or die(mysql_error());
	$req_name=$rs_req['req_name'];
	return $req_name;
}



function getemailaddress($user_id)
{
	 
	
	$sql_reqemail=mysql_query("select * from users  where user_id='".$user_id."'") or die(mysql_error());
	$rs_req_email=mysql_fetch_array($sql_reqemail) or die(mysql_error());
	$req_cemail=$rs_req_email['useremail'];
	return $req_cemail;
}



/*function getcatname($cat_id)
{

	$sql_cat=mysql_query("select * from category where cat_id='".$cat_id."'") or die(mysql_error());
	$rs_cat=mysql_fetch_array($sql_cat) or die(mysql_error());
	$rs_catname=$rs_cat['cat_name'];
	return $rs_catname;
	
}

function getcountry($country_id)
{
	$sql_country=mysql_query("select * from gap_country where country_id='".$country_id."'") or die(mysql_error());
	$rs_country=mysql_fetch_array($sql_country) or die(mysql_error());
	$rs_country_name=$rs_country['country_name'];
	return $rs_country_name;
}

function getstate($state_id)
{
	
	$sql_state=mysql_query("select * from gap_state  where state_id='".$state_id."'") or die(mysql_error());
	$rs_state=mysql_fetch_array($sql_state) or die(mysql_error());
	$rs_state_name=$rs_state['state_name'];
	return $rs_state_name;
}

function getcity($city_id)
{
	
	$sql_city=mysql_query("select * from gap_city  where city_id='".$city_id."'") or die(mysql_error());
	$rs_city=mysql_fetch_array($sql_city) or die(mysql_error());
	$rs_city_name=$rs_city['city_name'];
	return $rs_city_name;
}
function getthemeimage($mtheme_id)
{
	
	$sql_theme=mysql_query("select * from gap_theme  where theme_id='".$mtheme_id."'") or die(mysql_error());
	$rs_theme=mysql_fetch_array($sql_theme) or die(mysql_error());
	$rs_theme_samp=$rs_theme['theme_samp'];
	return $rs_theme_samp;
}
*/
function getlevel($level_id)
{
	
	$sql_level=mysql_query("select * from levels   where level_id='".$level_id."'") or die(mysql_error());
	$rs_level=mysql_fetch_array($sql_level) or die(mysql_error());
	$rs_level_name=$rs_level['level_name'];
	return $rs_level_name;
}

function getBaseUrl()

{

    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF'];
    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
    $pathInfo = pathinfo($currentPath);
    // output: localhost
    $hostName = $_SERVER['HTTP_HOST'];
    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
    // return: http://localhost/myproject/
    return $protocol.$hostName.$pathInfo['dirname']."/";
}
function geteuse($user_id)
{
	 
	
	$sql_reqemail=mysql_query("select * from users  where user_id='".$user_id."'") or die(mysql_error());
	$rs_req=mysql_fetch_array($sql_reqemail) or die(mysql_error());
	$reqt[]=$rs_req['contact'];
	$reqt[]=$rs_req['caddress'];
	$reqt[]=$rs_req['contactperson'];
	return $reqt;
}
?>