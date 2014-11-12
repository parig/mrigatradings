<?php
include "sessionchk.php";
//include 'class.phpmailer.php';
  
 if($_REQUEST['setmode']=='editold')
{ 
 if(trim($_REQUEST['password']))
 {
 	$updateqry1= "UPDATE `users` SET `userpass` = '".md5($_REQUEST['password'])."' WHERE `user_id` =".$_REQUEST['user_id'];
	$pass_insert1 = mysql_query($updateqry1) or die(mysql_error());
 }
 $updateqry= "UPDATE `users` SET `companyname` = '".$_REQUEST['companyname']."',
`caddress` = '".$_REQUEST['caddress']."',
`useremail` = '".$_REQUEST['email']."',
`contact` = '".$_REQUEST['contact']."',
`userstatus` = '".$_REQUEST['userstatus']."' WHERE `user_id` =".$_REQUEST['user_id'];
$pass_insert = mysql_query($updateqry) or die(mysql_error());
 
		
$msg="Updated succesfully...";
}

?>
<script language="javascript"> 
function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
}
function valid(str)
{
	
	
	
		if(document.form1.username.value==""){alert("Please enter user name");	document.form1.username.focus();return false;}
		if(document.form1.username.value!="")
			{
			var FN = document.form1.username.value.substring(0,1);
				if ( FN == ' ') 
					{
						alert("\n In the user, first character should not be a space. ");
						document.form1.username.select();
						document.form1.username.focus();
						return false;
					}		
			}
			
			if ((document.form1.username.value.length < 5) )
			{			 
			mesg = "You have entered " + document.form1.username.value.length + " character(s)\n"
			mesg = mesg + "Valid entries are minimum 5 characters.\n"			 
			alert(mesg);			 
			document.form1.username.focus();		 
			return (false);
			}
			if ((document.form1.username.value.length > 8) )
			{			 
			mesg = "You have entered " + document.form1.username.value.length + " character(s)\n"
			mesg = mesg + "Valid entries are maximum 8 characters.\n"			 
			alert(mesg);			 
			document.form1.username.focus();		 
			return (false);
			}
			
		 
			
			if(str=="add")
			{
				if(document.form1.password.value==""){alert("Please enter password");	document.form1.password.focus();return false;}
			}
			if(document.form1.password.value!="")
			{
				var FN = document.form1.password.value.substring(0,1);
				if ( FN == ' ') 
				{
					alert("\n In the password, first character should not be a space. ");
					document.form1.password.select();
					document.form1.password.focus();
					return false;
				}	
				
				if ((document.form1.password.value.length < 5) )
				{			 
				mesg = "You have entered " + document.form1.password.value.length + " character(s)\n"
				mesg = mesg + "Valid entries are minimum 5 characters.\n"			 
				alert(mesg);			 
				document.form1.password.focus();		 
				return (false);
				}
				if ((document.form1.password.value.length > 8) )
				{			 
				mesg = "You have entered " + document.form1.password.value.length + " character(s)\n"
				mesg = mesg + "Valid entries are maximum 8 characters.\n"			 
				alert(mesg);			 
				document.form1.password.focus();		 
				return (false);
				}
				
			 }	
		if(document.form1.level_id.value==''){alert("Please select the user type");document.form1.level_id.focus();return false;}
		if(document.form1.email.value==""){alert("Please enter the emailid");	document.form1.email.focus();return false;}
		if (echeck(document.form1.email.value)==false){
		document.form1.email.focus()
		return false
		}
		
 
	
		
		if(str=="add"){document.form1.setmode.value="addnew";document.form1.action="index.php?pagesv=myaccount";document.form1.submit();return true;}
		else if(str=="edit"){document.form1.setmode.value="editold";document.form1.action="index.php?pagesv=myaccount";document.form1.submit();return true;}
}
</script>
 
<?

		if($_SESSION['adminid']!="")
		{
			
			$chkdup1=mysql_query("select * from users   where user_id=".$_SESSION['adminid']) or die(mysql_error());
			if(mysql_num_rows($chkdup1)!=0) 
			{
				$cnt12=mysql_fetch_array($chkdup1);				
				
			 
				if($_REQUEST['email']){$email =$_REQUEST['email'];}else{$email =$cnt12['useremail'];}
				if($_REQUEST['userstatus']){$userstatus =$_REQUEST['userstatus'];}else{$userstatus =$cnt12['userstatus'];}				
				if($_REQUEST['username']){$username =$_REQUEST['username'];}else{$username =$cnt12['username'];}
			 
				if($_REQUEST['level_id']){$level_id =$_REQUEST['level_id'];}else{$level_id =$cnt12['level_id'];}
			 
		 
				
			}
		}		
		

?>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/theme.css" rel="stylesheet" type="text/css" />
<link href="css/simpletree.css" rel="stylesheet" type="text/css" />
<link href="css/mystyle.css" rel="stylesheet" type="text/css" />
<form action="" method="post"  name="form1" >
<table width="93%"  border="0" align="center" cellpadding="3" cellspacing="0" bordercolor="#EAEAEA" class="page-head-black" >
          <tr>
            <td width="5%" align="left"><strong><img src="otherimages/user.png" width="48" height="48"></strong></td>
            <td width="14%" align="left"><strong>My Profile</strong></td>
            <td align="right"><?php //include 'regilog.php';?>
            </td>
          </tr>
  </table>

      <br>
      <table width="93%"  border="0" align="center" cellpadding="3" cellspacing="0" class="tbtxt"  >
        <tr >
          <td colspan="2" align="left" class="ArialTxtBlack" ><?php if($_SESSION['level_id']!=4) {?><table width="15%"  border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
              <td width="52%"><div align="right"><a href="index.php?pagesv=mng_users"><img src="otherimages/cancel_f2.png" width="32" height="32" border="0"></a></div></td>
            </tr>
            <tr>
              <td><div align="right"><strong>Cancel</strong></div></td>
            </tr>
          </table><?php } ?></td>
        </tr>
        <tr >
          <td colspan="2" align="center" class="ArialTxtBlack" style="color:#F00;"><strong><?php echo $msg;?></strong></td>
        </tr>
        <tr >
          <td colspan="2" align="left" class="ArialTxtBlack" ><strong>Login information </strong></td>
        </tr>
        <tr>
          <td colspan="2" align="left"  height="1px;"  bgcolor="#205594" ></td>
        </tr>
        <tr>
          <td align="left"  >&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td width="47%" align="left"  >User Name * </td>
          <td width="53%" align="left"><input name="username" type="text" class="tbtxt"   value="<?=$username?>"  readonly="readonly"></td>
        </tr>
        <tr>
          <td align="left"  >New Password * </td>
          <td align="left"><input name="password" type="text" class="tbtxt"    id="password" value="<?=$password?>"></td>
        </tr>
        <tr>
          <td align="left"  >User Type * </td>
          <td align="left"><select name="level_id" id="level_id" disabled="disabled">
            <option value="">Select User Type</option>
            <?php 
				  $getlevel=mysql_query("select * from levels  ") or die(mysql_error);
					while($rsgetl=mysql_fetch_array($getlevel)){
				  ?>
            <option value="<?php echo $rsgetl['level_id'];?>" <?php if($rsgetl['level_id']==$level_id) echo "selected";?>><?php echo $rsgetl['level_name'];?></option>
            <?php } ?>
          </select></td>
        </tr>
        <tr>
          <td align="left"  >Email *</td>
          <td align="left"><input name="email" type="text" class="tbtxt"  <?php if($_SESSION['level_id']!=1) {?>readonly="readonly" <?php } ?> value="<?=$email?>" size="50" /></td>
        </tr>
        <tr valign="top">
          <td align="left"  >Status * </td>
          <td align="left"><input name="userstatus" type="radio" value="1" <? if($userstatus=='1') echo "checked";?>>
            Active
              <input name="userstatus" type="radio" value="0" <? if($userstatus=='0') {echo "checked";} if($_REQUEST["action"]=="add") { echo "checked"; }?> > 
              In-Active </td>
        </tr>

        <tr align="center" valign="top">
          <td colspan="2" align="left">
		  <input type="hidden" name="action" value="<?=$_REQUEST["action"]?>">
		  <input type="hidden" name="user_id" value="<?=$_SESSION['adminid']?>">
		   
              <div class="enter"><div class="enter_inner"><input name="Submit" type="submit" onClick="return valid('edit');"  value="Update">
			  </div></div>
		
			
             <input type="hidden" name="setmode"></td></tr>
        <tr align="center">
          <td colspan="2"><span class="stylered">
          <?=$msg ?>
       </span></td>
        </tr>
  </table>
</form>