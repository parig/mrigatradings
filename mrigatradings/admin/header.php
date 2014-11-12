<?php

if($_SESSION['adminid'])

{

$getname=mysql_query("select * from users where user_id='".$_SESSION['adminid']."'") or die(mysql_error);

$rsget=mysql_fetch_array($getname);

$levelname=getlevel($rsget['level_id']);

 
	

$displyname=$rsget['username']."-".$levelname;

 



}

else

{

	$displyname="Guest";

}

?>
<style>
.style2 td{ color:#FFF; font-size:11px;}
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<link href="css/theme.css" rel="stylesheet" type="text/css" />

 
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>

	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />






<table width="100%" border="0" cellspacing="0" cellpadding="0" class="topheader">

  <tr>

    <td height="50" valign="top"> <table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td width="690"><a href="#"><img src="images/logo.png" width="307"  border="0" /></a></td>

    <td width="436" align="right" ><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td align="right" valign="top" class="btn-top"><span class="page-head-black"><img src="otherimages/users.png" width="16" height="16" />&nbsp;</span><span class="theme4-txt-font">

          <?=$displyname?>

        </span></td>

      </tr>

      <? if($_SESSION['adminid'])

{ ?>

      <tr>

        <td align="right" class="btn-top"><a href="logout.php" style="color:#FFF;">Log Out</a></td>

      </tr>

      <? } ?>

    </table></td>

  </tr>

</table> </td>

  </tr>

</table>



