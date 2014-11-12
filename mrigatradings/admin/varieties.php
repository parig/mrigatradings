<?php
include "sessionchk.php";
 
date_default_timezone_set ("Asia/Calcutta"); 
$script_tz = date_default_timezone_get();
if (strcmp($script_tz, ini_get('date.timezone'))){
    //echo 'Script timezone differs from ini-set timezone.';
} else {
    //echo 'Script timezone and ini-set timezone match.';
} 
 $toda=mktime(0, 0, 0, date("m"), date("d"),   date("Y")); 
 $getdate=date("d-m-Y",'1311100200');

if($_REQUEST['setmode']=='addnew')
{ 
	 		
	 $insert="INSERT INTO `product_variety` (
	`product_cat_id` ,
	`product_id` ,
	`countryID` ,
	`stateID` ,
	`cityID` ,
	`variety_name` ,
	`variety_decription` ,	
	`variety_status`,
	`varieties`,
	`origins`
	)
	VALUES ('".$_REQUEST['product_cat_id']."','".$_REQUEST['product_id']."', '".$_REQUEST['countryID']."','".$_REQUEST['stateID']."','".$_REQUEST['cityID']."', '".$_REQUEST['variety_name']."', '".$_REQUEST['variety_decription']."', '1','".$_REQUEST['varieties']."','".$_REQUEST['origins']."')";		
			//exit;
	 $pass_insert = mysql_query($insert) or die(mysql_error()); 
	
	 $getid=mysql_insert_id();
	
	 /////////////////////////////////////////////////////////////Normal IMAGE2 UPLOAD///////////////////////
		
		$temp_name1 = $_FILES['variety_image']['tmp_name'];
		$namess = $_FILES['variety_image']['name'];
		$explodes=explode(".",$namess);
		if($_FILES['variety_image']['size'] != '0')	
		{		
			$photos=$explodes[0]."-".$getid.".".$explodes[1];			
			$destination ="../images/products/".$photos;		
			move_uploaded_file($temp_name1, $destination);	
		    $updates_ins="update product_variety  set variety_image ='".$photos."' where variety_id='".$getid."'";
		    $sql_updates=mysql_query($updates_ins)or die(mysql_error());		 
		}
	   ///////////////////////////////////////////END OF IMAGE UPLOAD/////////////////////////////
	   
	   
	   
	echo "<script type=\"text/javascript\">alert(\"New variety has been added sucessfully\");location.replace(\"index.php?pagesv=mng_varieties\");</script>";
	//echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?pagesv=mng_varieties\">";
	 
}	 
 if($_REQUEST['setmode']=='editold')
{ 
    
$updateqry="UPDATE  `product_variety` SET `variety_name` = '".$_REQUEST['variety_name']."',
`product_cat_id` = '".$_REQUEST['product_cat_id']."',
`product_id` = '".$_REQUEST['product_id']."',
`countryID` = '".$_REQUEST['countryID']."',
`stateID` = '".$_REQUEST['stateID']."',
`cityID` = '".$_REQUEST['cityID']."',
`varieties` = '".$_REQUEST['varieties']."',
`origins` = '".$_REQUEST['origins']."',
`variety_decription` = '".$_REQUEST['variety_decription']."'  WHERE `variety_id` =".$_REQUEST['variety_id'];

$pass_insert = mysql_query($updateqry) or die(mysql_error());

 /////////////////////////////////////////////////////////////Normal IMAGE2 UPLOAD///////////////////////
		$getid=$_REQUEST['variety_id'];
		$temp_name1 = $_FILES['variety_image']['tmp_name'];
		$namess = $_FILES['variety_image']['name'];
		$explodes=explode(".",$namess);
		if($_FILES['variety_image']['size'] != '0')	
		{		
			$photos=$explodes[0]."-".$getid.".".$explodes[1];		
			$destination ="../images/products/".$photos;		
			move_uploaded_file($temp_name1, $destination);	
		   $updates_ins="update product_variety  set variety_image ='".$photos."' where variety_id='".$getid."'";
		   $sql_updates=mysql_query($updates_ins)or die(mysql_error());		 
		}
	   ///////////////////////////////////////////END OF IMAGE UPLOAD/////////////////////////////
	   
	    
echo "<script type=\"text/javascript\">alert(\"Variety has been modified sucessfully\");location.replace(\"index.php?pagesv=mng_varieties\");</script>";
//echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?pagesv=mng_varieties\">";
$msg="Updated succesfully...";
}
	
?>
<script language="javascript"> 

function valid(str)
{
	
	
		if(document.form1.product_cat_id.value==""){alert("Please select category name");	document.form1.product_cat_id.focus();return false;}
		if(document.form1.product_id.value==""){alert("Please select product name");	document.form1.product_id.focus();return false;}

		if(document.form1.variety_name.value==""){alert("Please enter variety name");	document.form1.variety_name.focus();return false;}
		if(document.form1.variety_name.value!="")
			{
			var FN = document.form1.variety_name.value.substring(0,1);
				if ( FN == ' ') 
					{
						alert("\n In the user, first character should not be a space. ");
						document.form1.variety_name.select();
						document.form1.variety_name.focus();
						return false;
					}		
			}
		
		if(document.form1.countryID.value==""){alert("Please select country name");	document.form1.countryID.focus();return false;}
		if(document.form1.stateID.value==""){alert("Please select state name");	document.form1.stateID.focus();return false;}
		if(document.form1.cityID.value==""){alert("Please select Location name");	document.form1.cityID.focus();return false;}
		
 	
		
		if(document.form1.variety_decription.value==""){alert("Please enter the description");	document.form1.variety_decription.focus();return false;}
		if(document.form1.variety_decription.value!="")
			{
			var FN = document.form1.variety_decription.value.substring(0,1);
				if ( FN == ' ') 
					{
						alert("\n In the user, first character should not be a space. ");
						document.form1.variety_decription.select();
						document.form1.variety_decription.focus();
						return false;
					}		
			}		
		
		if(str=="add"){document.form1.setmode.value="addnew";document.form1.action="index.php?pagesv=varieties";document.form1.submit();return true;}
		else if(str=="edit"){document.form1.setmode.value="editold";document.form1.action="index.php?pagesv=varieties";document.form1.submit();return true;}
}
</script>
 
<?
if ($_REQUEST['action']=="view" || $_REQUEST['action']=="edit")
{
		if($_REQUEST['variety_id']!="")
		{
			
			$chkdup1=mysql_query("select * from product_variety   where variety_id=".$_REQUEST['variety_id']) or die(mysql_error());
			if(mysql_num_rows($chkdup1)!=0) 
			{
				$cnt12=mysql_fetch_array($chkdup1);				
				
				if($_REQUEST['product_cat_id']){$product_cat_id =$_REQUEST['product_cat_id'];}else{$product_cat_id =$cnt12['product_cat_id'];}
				if($_REQUEST['product_id']){$product_id =$_REQUEST['product_id'];}else{$product_id =$cnt12['product_id'];}
				if($_REQUEST['countryID']){$countryID =$_REQUEST['countryID'];}else{$countryID =$cnt12['countryID'];}
				if($_REQUEST['stateID']){$stateID =$_REQUEST['stateID'];}else{$stateID =$cnt12['stateID'];}
				if($_REQUEST['cityID']){$cityID =$_REQUEST['cityID'];}else{$cityID =$cnt12['cityID'];}
				if($_REQUEST['variety_name']){$variety_name =$_REQUEST['variety_name'];}else{$variety_name=$cnt12['variety_name'];}	
				if($_REQUEST['varieties']){$varieties =$_REQUEST['varieties'];}else{$varieties=$cnt12['varieties'];}	
				if($_REQUEST['origins']){$origins =$_REQUEST['origins'];}else{$origins=$cnt12['origins'];}	
				$variety_image =$cnt12['variety_image'];
				if($_REQUEST['variety_decription']){$variety_decription =$_REQUEST['variety_decription'];}else{$variety_decription =$cnt12['variety_decription'];}				
				
				
			}
		}		
		
}
 else
		{
				if($_REQUEST['product_cat_id']){$product_cat_id =$_REQUEST['product_cat_id'];}
				if($_REQUEST['product_id']){$product_id =$_REQUEST['product_id'];}
				if($_REQUEST['countryID']){$countryID =$_REQUEST['countryID'];}
				if($_REQUEST['stateID']){$stateID =$_REQUEST['stateID'];}	
				if($_REQUEST['cityID']){$cityID =$_REQUEST['cityID'];}	
				if($_REQUEST['varieties']){$varieties =$_REQUEST['varieties'];}
				if($_REQUEST['variety_name']){$variety_name =$_REQUEST['variety_name'];}
				if($_REQUEST['origins']){$origins =$_REQUEST['origins'];}
				if($_REQUEST['variety_decription']){$variety_decription =$_REQUEST['variety_decription'];}						
				/*if($_REQUEST['password']){$password =$_REQUEST['password'];}
				 
				if($_REQUEST['active']){$active =$_REQUEST['active'];}*/
		}	 
?>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/theme.css" rel="stylesheet" type="text/css" />
<link href="css/simpletree.css" rel="stylesheet" type="text/css" />
<link href="css/mystyle.css" rel="stylesheet" type="text/css" />
<form action="" method="post" enctype="multipart/form-data"  name="form1" >
<table width="93%"  border="0" align="center" cellpadding="3" cellspacing="0" bordercolor="#EAEAEA" class="page-head-black" >
          <tr>
            <td width="5%" align="left"><strong><img src="otherimages/user.png" width="48" height="48"></strong></td>
            <td width="22%" align="left"><strong>Variety <? if($_REQUEST['action']=='add') echo "[ New ]"; if($_REQUEST['action']=='edit') echo "[ Edit ]";?></strong></td>
            <td width="73%" align="right"><?php //include 'regilog.php';?>
            </td>
          </tr>
  </table>

      <br>
      <table width="93%"  border="0" align="center" cellpadding="3" cellspacing="0" class="tbtxt"  >
        <tr >
          <td colspan="2" align="left" class="ArialTxtBlack" ><table width="100%"  border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
              <td width="52%"><a href="index.php?pagesv=mng_varieties"><img title="Back to list of document" src="otherimages/back_f2.png" width="32" height="32" border="0" /></a></td>
              <td width="52%"><div align="right"><a href="index.php?pagesv=mng_varieties"><img src="otherimages/cancel_f2.png" width="32" height="32" border="0"></a></div></td>
            </tr>
            <tr>
              <td><strong>Back to list of varieties</strong></td>
              <td><div align="right"><strong>Cancel</strong></div></td>
            </tr>
          </table></td>
        </tr>
        <tr >
          <td colspan="2" align="left" class="ArialTxtBlack" >&nbsp;</td>
        </tr>
        <tr >
          <td colspan="2" align="left" class="ArialTxtBlack" ><strong>Variety information </strong></td>
        </tr>
        <tr>
          <td colspan="2" align="left"  height="1px;"  bgcolor="#205594" ></td>
        </tr>
        <tr>
          <td align="left"  >&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left"  >Select Category*</td>
          <td align="left"><select name="product_cat_id" id="product_cat_id" class="tbtxt" onchange="submit();">
            <option value="" >--Select Category--</option>
            <?php $sql=mysql_query("select * from product_categories  order by product_cat_name asc") or die(mysql_error());
					while($rs=mysql_fetch_array($sql)){
					?>
            <option value="<?=$rs['product_cat_id']?>" <? if($product_cat_id==$rs['product_cat_id']) echo "selected";?>><?php echo $rs['product_cat_name'];?></option>
            <?php }?>
          </select></td>
        </tr>
        <tr>
          <td align="left"  >Select Product*</td>
          <td align="left"><select name="product_id" id="product_id" class="tbtxt">
            <option value="" >--Select Product--</option>
            
            <?php 
			if($product_cat_id){
			$sql_p=mysql_query("select * from products where product_cat_id='".$product_cat_id."' order by product_name asc") or die(mysql_error());
					while($rs_p=mysql_fetch_array($sql_p)){
					?>
            <option value="<?=$rs_p['product_id']?>" <? if($product_id==$rs_p['product_id']) echo "selected";?>><?php echo $rs_p['product_name'];?></option>
            <?php } }?>
          </select></td>
        </tr>
        <tr>
          <td width="47%" align="left"  >Variety Name*</td>
          <td width="53%" align="left"><input name="variety_name" type="text" class="tbtxt"   value="<?php echo $variety_name;?>" ></td>
        </tr>

        <tr>
          <td align="left"  >Select Country*</td>
          <td align="left"><select name="countryID" id="countryID" class="tbtxt" onchange="submit();">
            <option value="" >--Select Country--</option>
            <?php $sql1=mysql_query("select * from countries order by countryName asc") or die(mysql_error());
					while($rs_co=mysql_fetch_array($sql1)){
					?>
            <option value="<?=$rs_co['countryID']?>" <? if($countryID==$rs_co['countryID']) echo "selected";?>><?php echo $rs_co['countryName'];?></option>
            <?php }?>
          </select></td>
        </tr>
        <tr>
          <td align="left"  >Select State*</td>
          <td align="left"><select name="stateID"  id="stateID" class="tbtxt" onchange="submit();">
            <option value="" >--Select State--</option>
            <?php if($countryID) {?>
			
			<?php $sql2=mysql_query("select * from states where countryID='".$countryID."' order by stateName	asc") or die(mysql_error());
					while($rs_s=mysql_fetch_array($sql2)){
			?>
            <option value="<?=$rs_s['stateID']?>" <? if($stateID==$rs_s['stateID']) echo "selected";?>><?php echo $rs_s['stateName'];?></option>
           	<?php } ?>
            
			<?php }?>
          </select></td>
        </tr>
        <tr>
          <td align="left"  >Select City*</td>
          <td align="left"><select name="cityID" id="cityID" class="tbtxt">
            <option value="" >--Select City--</option>
            
            
			<?php if($stateID){?>
            
			<?php $sql3=mysql_query("select * from cities where stateID='".$stateID."' and countryID='".$countryID."' order by cityName asc") or die(mysql_error());
					while($rs_c=mysql_fetch_array($sql3)){
			?>
            <option value="<?=$rs_c['cityID']?>" <? if($cityID==$rs_c['cityID']) echo "selected";?>><?php echo $rs_c['cityName'];?></option>
            <?php }?>
            
            <?php } else { ?>
            <?php $sql3=mysql_query("select * from cities where stateID='0' and countryID='".$countryID."' order by cityName asc") or die(mysql_error());
					while($rs_c=mysql_fetch_array($sql3)){
			?>
            <option value="<?=$rs_c['cityID']?>" <? if($cityID==$rs_c['cityID']) echo "selected";?>><?php echo $rs_c['cityName'];?></option>
            <?php }?>
            <?php } ?>
          </select></td>
        </tr>
        <tr valign="top">
          <td align="left"  >Varieties</td>
          <td align="left"><textarea name="varieties" id="varieties" cols="45" rows="5"><?php echo $varieties;?></textarea></td>
        </tr>
        <tr valign="top">
          <td align="left"  >Origins</td>
          <td align="left"><textarea name="origins" id="origins" cols="45" rows="5"><?php echo $origins;?></textarea></td>
        </tr>
        <tr valign="top">
          <td align="left"  >Variety Decription*</td>
          <td align="left"><label>
            <textarea name="variety_decription" id="variety_decription" cols="45" rows="5"><?php echo $variety_decription;?></textarea>
          </label></td>
        </tr>
        <tr>
          <td align="left"  >Upload Image</td>
          <td align="left"><input type="file" name="variety_image" id="variety_image" />
           <?php if($variety_image){?> [<a href="../images/products/<?php echo $variety_image;?>" target="_blank"><?php echo $variety_image;?></a>] <?php }?></td>
        </tr>   
        
                <tr>
          <td align="left"> </td>
          <td align="left"> 
           <?php if($variety_image){?> <img  src="../images/products/<?php echo $variety_image;?>"/>  <?php }?></td>
        </tr>   
             
        <tr align="center" valign="top">
          <td colspan="2" align="left">
		  <input type="hidden" name="action" value="<?=$_REQUEST["action"]?>">
		  <input type="hidden" name="variety_id" value="<?=$_REQUEST["variety_id"]?>">
		  <? if($_REQUEST["action"]=="add") 
		  {
		  	$btname="Add New";
		  }elseif($_REQUEST["action"]=="edit") {$btname="Update";}
		  ?>
              <div class="enter"><div class="enter_inner"><input name="Submit" type="submit" onClick="return valid('<?=$_REQUEST['action']?>');"  value="<?=$btname?>">
			  </div></div>
		
			
             <input type="hidden" name="setmode"></td></tr>
        <tr align="center">
          <td colspan="2"><span class="stylered">
          <?=$msg ?>
       </span></td>
        </tr>
  </table>
</form>