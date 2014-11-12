<?php 

	ob_start();

	session_start(); 

	include "config.php";

	include "sessionchk.php";

	include "getdetails.php";

	function codegen($code,$place)

	{						

		  $codeval=(int)$code;						

		  $codeval=$code+1000000001;

		  $leng=strlen(floatval($codeval));

		  $code=substr(floatval($codeval),($leng)-$place,$place);

		  $met=$code;

		  return $met;

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<style type="text/css">

<!--

.style21 {color: #7B9F53}

-->

</style>

<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>

<script src="js/lib/jquery.cookie.js" type="text/javascript"></script>

<script src="js/jquery.treeview.js" type="text/javascript"></script>

<link rel="stylesheet" href="css/jquery.treeview.css" />



<script type="text/javascript">

		$(function() {

			$("#tree").treeview({

				collapsed: true,

				animated: "medium",

				control:"#sidetreecontrol",

				persist: "location"

			});

		})

		
function onlinequote() {

$.fancybox({

'href': 'createpdf.php?action=add',

'width'    : '100%',

'height'   : '100%',

'autoScale'   : true,

'transitionIn'  : 'none',

'transitionOut'  : 'none',

'type'    : 'iframe'



 });

}
	</script>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Mriga Tradings</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />

</head>

<body >

<? include "header.php"; ?>

<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center" valign="top" >

    

    <table width="987" border="0" cellspacing="0" cellpadding="0">

      

      

      <tr>

        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

            <tr>

              <td align="left" valign="top" width="15%"><? include "left.php"; ?></td>

              <td align="left" valign="top" width="85%"><? if($_REQUEST['pagesv']) {include $_REQUEST['pagesv'].".php";}?></td>

            </tr>

          </table></td>

      </tr>

      

     

    </table></td>

  </tr>

</table><br />



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

