<?php 			
ob_start();
session_start();
include "config.php";
include "getdetails.php";
if($_REQUEST['Submit']=='ENTER')
{
	$username=$_REQUEST['username'];
	$password=$_REQUEST['password'];
	$check=$_REQUEST['check'];
	if($check)
	{
		
		$value=$username;
		setcookie("cookieval", $value, time()+3600);
	}
	 $log_sel="select * from users where  username='".$username."' and userpass='".md5($password)."' and userstatus=1 and level_id='".$_REQUEST['level_id']."'";	
	$log_sql=mysql_query($log_sel);
	$log_num=mysql_num_rows($log_sql);
	$log_res=mysql_fetch_array($log_sql);	
	if($log_num)
	{
			
				$_SESSION['adminname']=$log_res['username'];
				$_SESSION['adminid']=$log_res['user_id'];
				$_SESSION['adminemail']=$log_res['useremail'];
				$_SESSION['level_id']=$log_res['level_id'];
				if($_SESSION['level_id']!=4)
				{
				echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?pagesv=mng_users\">";
				}
				else
				{
					echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?pagesv=mng_clientdocsm\">";
				}
		
	}
	else
	{
		$errmsg= "Incorrect Username, Password. Please try again";
	}

}
?>
<script language="javascript">
function valids()
{
	
	if(document.loginfrm.username.value=="")
	{
		alert("Please Enter the User Name.");
		document.loginfrm.username.focus();
		return false;
	}
	 
	if(document.loginfrm.password.value=="")
	{
		alert("Please Enter The Password.");
		document.loginfrm.password.focus();
		return false;
	}
	
	if(document.loginfrm.level_id.value=="")
	{
		alert("Please select the user type.");
		document.loginfrm.level_id.focus();
		return false;
	}
	
	 
	return true; 
	}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
<!--
.style21 {color: #7B9F53}
-->
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LOGIN AUTHENTICATION</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/theme.css" rel="stylesheet" type="text/css" />


<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
</head>
<body >
<? include "header.php"; ?>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"  ><table width="987" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"></td>
      </tr>
	  
    
      
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><form name="loginfrm" id="loginfrm" method="post" action="login.php">
         <? if($errmsg) {?>
		  <table width="45%"  border="0" align="center"  class="message">
            <tr>
              <td ><img src="otherimages/showinfo.png" width="24" height="24" />                </td>
              <td ><?=$errmsg?></td>
            </tr>
          </table>
          <br />
		  <? } ?>
          <table width="45%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#F2F2F2" bgcolor="#FFFFFF">
            <tr>
              <td width="33%" align="center"><img src="otherimages/locked_area_m15.jpg" width="134" height="134" /></td>
              <td width="67%"><table width="75%"  border="0" align="center" cellpadding="3" cellspacing="0">
                <tr>
                  <td align="center"><h1 class="theme2-heading style21">LOGIN AUTHENTICATION</h1></td>
                </tr>			
               
                <tr>
                  <td class="hot-txt-left">User name</td>
                </tr>
                <tr>
                  <td><input name="username" type="text" class="bdy-txt"  value="<?=$_COOKIE['cookieval']?>"/></td>
                </tr>
                <tr>
                  <td class="hot-txt-left">Password</td>
                </tr>
                <tr>
                  <td><input name="password" type="password" class="bdy-txt" /></td>
                </tr>
                <tr>
                  <td><span class="hot-txt-left">User Type</span></td>
                </tr>
                <tr>
                  <td><select name="level_id" id="level_id">
                   
                  <option value="">Select User Type</option>
                  <?php 
				  $getlevel=mysql_query("select * from levels  ") or die(mysql_error);
					while($rsgetl=mysql_fetch_array($getlevel)){
				  ?>
                  
                  <option value="<?php echo $rsgetl['level_id'];?>"><?php echo $rsgetl['level_name'];?></option>
                <?php } ?>
                  </select></td>
                </tr>
                <tr>
                  <td class="hot-txt-left"> 
                    <input type="checkbox" name="check" id="check"  value="1"/>
                   
                    Remember Me</td>
                </tr>
                <tr>
                  <td align="left"><div class="enter"><div class="enter_inner">
                    <input type="submit" name="Submit" value="ENTER"  onclick="return valids();"/></div></div></td>
                </tr>
                <tr>
                  <td class="view-txt">Use a valid username and password to gain access to the administration console.</td>
                </tr>
                <tr>
                  <td><a href="../index.php" class="copyright">Return to the site's Home Page.</a></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </form></td>
      </tr>
       
    </table></td>
  </tr>
</table> 
<div style="vertical-align:bottom">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="footer">
  <tr>
    <td height="50" valign="top"><table width="75%" border="0" align="center" cellpadding="0" cellspacing="6">
      <tr>
        <td style="font-size: 10px;">&copy; Copyright 2013 – 2014</td>
        <td align="right">&nbsp;</td>
      </tr>
      <tr>
        <td style="font-size: 10px;">Designed and Developed by <a href="http://www.madronesoft.com" target="_blank">Madrone Software Technologies India Pvt Ltd</a></td>
        <td align="right">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</div>
</body>
</html>
