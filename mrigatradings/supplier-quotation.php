<?php 
ob_start();
require 'config.php'; 
session_start();
date_default_timezone_set ("Asia/Singapore"); 
$script_tz = date_default_timezone_get();


if($_POST['submit']=='Submit'){
	
if(empty($_SESSION['letters_code'] ) || strcasecmp($_SESSION['letters_code'], $_POST['letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors = "The Verification code does not match!, Please enter valid Verification Code.";
		
$sname=$_REQUEST['sname'];
$email_id=$_REQUEST['email_id'];
$mobile_phone=$_REQUEST['ph_ccode1'].'-'.$_REQUEST['mobile_phone'];
$l_phone=$_REQUEST['ph_ccode2'].'-'.$_REQUEST['phoneno'];
$fax=$_REQUEST['ph_ccode3'].'-'.$_REQUEST['fax'];
$supplier_exp=$_REQUEST['supplier_exp'];
$address=nl2br(stripslashes($_REQUEST['address']));
$ptinfo=nl2br(stripslashes($_REQUEST['ptinfo']));
$message1=nl2br(stripslashes($_REQUEST['message1']));

$pname=$_REQUEST['pname'];
$shipping=$_REQUEST['shipping'];
$port=$_REQUEST['port'];
$uprice=$_REQUEST['uprice'];
$currency=$_REQUEST['currency'];
$moq=$_REQUEST['moq'];
$measurement=$_REQUEST['measurement'];
 
if($_REQUEST['country_code']){
$country=explode('^',$_REQUEST['country_code']);
$country=$country[0];
} 
if($_REQUEST['state_code1'])
{
	$only_state_code=', '.$_REQUEST['state_code1'];
}


$country  = $country.$only_state_code;
echo "<script type=\"text/javascript\">window.location = '#elementId';</script>";
	}
	
	if(empty($errors))
	{	
		include 'mail-supplier-quotation.php';
		
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Supplier Quotation | Mriga Tradings</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link href="includes/dynamic_1005_styles.css" rel="stylesheet" type="text/css">
    <link href="css/datepicker.css" rel="stylesheet"  type="text/css" />
    <style>
    .datepicker.datepicker-dropdown.dropdown-menu{ background-color:#333;}
    </style>    
 
</head><!--/head-->

<body >
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
 <li><i class="fa"></i> Registration No: 53270385E</li> 
                               <li style=" padding:0px; margin-left:-11px;"><i class="fa" ></i> <img src="images/home/singapore-flag.png" width="24" height="24"/></li>             
							</ul>                             
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
                            	<li><a href="index.php" style="padding-top:1px;"><i class="fa fa-facebook"><img src="images/home/home.png"/></i></a></li>
								<li><a href="https://www.facebook.com/pages/Mriga-tradings/862240903786977?ref=br_tf" target="_blank"><i class="fa fa-facebook"><img src="images/home/facebook.png" /></i></a></li>
								<li><a href="https://twitter.com/mrigatradings" target="_blank"><i class="fa fa-twitter"><img src="images/home/twitter.png" /></i></a></li>
								<li><a href="javascript:void(0)"><i class="fa fa-linkedin"><img src="images/home/linkedin.png" /></i></a></li>								 
								<li><a href="skype:mrigatradings.com.sg?call"><i class="fa fa-google-plus"><img src="images/home/skype.png" /></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="myfont" align="center">
						<div class="logo">
							<img src='images/home/mriga-tradings.png' alt='Mriga-tradings' />
						</div>
					<div class="col-sm-3" style="float:right;">
						<div class="address" style="margin-top:-100px;">
							<img alt="" src="images/home/map.png">
							
						</div>
					</div>				
				  </div>
					
				</div>
			</div>
		</div><!--/header-middle-->
	
		<?php include 'topmenu.php';?>
	</header><!--/header-->
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center"></h2>    			    				    				
					
				</div>			 		
			</div>    	
            <div class="col-sm-12">    			   			
					<h2 class="title text-center">Supplier  <strong>Quotation</strong></h2>    			    				    				
					 
					</div>
			</div>   
    		<div class="row">  	
	    		<div class="col-sm-12">
	    			<div class="contact-form">
	    				
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form novalidate="novalidate" name="joinForm" id="joinForm" method="post" action="supplier-quotation.php" enctype="multipart/form-data">
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Supplier Name </label>
				                <input type="text" value="<?php echo $_REQUEST['sname'];?>" name="sname" style="width:320px;" class="input"  placeholder="Supplier Name" onKeyPress="return checkAlphaCharacters(event)">
				            </div>
                            
                            <div class="form-group col-md-12" style="margin-left: 1px;">
                             <label for="country" style="width:120px;"> Address  </label>
				                <textarea name="address" id="address"  class=""  style="height:60px; width:320px;" placeholder="Address"  onKeyPress="return checkAlphaCharacters(event)"><?php echo $_REQUEST['address'];?></textarea>
				            </div>                              

<!-- FROM Contact-->
 <div class="form-group col-md-12">
				                <label for="country" style="width:120px;"> Country  </label>
<select name="country_code" class="input w260px " style="width:200px;" id="country" onChange="if(this.value == 'SG^65'){$('#mobile_phone').attr('minlength','8');$('#mobile_phone').attr('maxlength','8');} $('#isd_code').val(this.value.substr(3,this.value.length)); $('#isd2_code').val(this.value.substr(3,this.value.length)); $('#isd3_code').val(this.value.substr(3,this.value.length))">
	<option selected="selected" value="">- - - - - select one - - - - -</option>
    <?php  
	$getlevel=mysql_query("select * from  frm_country order by c_name asc") or die(mysql_error);
	while($rsgetl=mysql_fetch_array($getlevel)){										
	?>
		 <option value="<?php echo $rsgetl['c_code'];?>" <?php if($rsgetl['c_code']==$_REQUEST['country_code']) echo "selected";?>><?php echo stripslashes($rsgetl['c_name']);?></option>
        <?php } ?>
		</select>                                
        
</div>
  

                      

<div class="form-group col-md-12"> 
	<label for="state" style="width:120px;"> State/City Name  </label>    
	 <input name="state_code1" class="input w250px" style="width:200px;" id="state_code1" type="text" value="<?php echo $_REQUEST['state_code1'];?>">
</div>    
 
    
				            <div class="form-group col-md-12"  >		
                            <label for="country" style="width:120px;"> Mobile no.</label>		              
                                <input  placeholder="ISD"   value="<?php echo $_REQUEST['ph_ccode1'];?>" class="input w30px mr5px" name="ph_ccode1" id="isd_code" type="text" style="width:35px;">
	<input name="mobile_phone" placeholder="Mobile No." class="input w200px m5px" style="width:162px;" id="mobile_phone" onKeyPress="return isNumberKey(event);" minlength="10" maxlength="10" type="text"  value="<?php echo $_REQUEST['mobile_phone'];?>">
				            </div>                                
                             <div class="form-group col-md-12"  >
                             <label for="company" style="width:120px;"><span class="star"></span> Telephone no.</label>
                             <input  placeholder="ISD" class="input w30px mr5px" value="<?php echo $_REQUEST['ph_ccode2'];?>" name="ph_ccode2" id="isd2_code" type="text" style="width:35px;">
				                <input type="text" name="phoneno" class="input" value="<?php echo $_REQUEST['phoneno'];?>"  placeholder="Phone No" style="width:162px;">
				            </div>
 
				                 <div class="form-group col-md-12" >
                            <label for="company" style="width:120px;"><span class="star"></span> Email </label>
				                <input type="email" name="email_id" id="email_id" value="<?php echo $_REQUEST['email_id'];?>" style="width:320px;" class="input"  placeholder="Email Id">
				            </div>
                            
                              <div class="form-group col-md-12" >
                             <label for="country" style="width:120px;"> Fax </label>
                             <input  placeholder="ISD" value="<?php echo $_REQUEST['ph_ccode3'];?>" class="input w30px mr5px" name="ph_ccode3" id="isd3_code" type="text" style="width:35px;">	
				                <input type="text" name="fax" class="input"  value="<?php echo $_REQUEST['fax'];?>" placeholder="Fax" style="width:162px;">
				            </div>                               
                            
<!-- FROM Contact-->                                
                            
  
                            <div class="form-group col-md-12">
                            <table id="myTable"   class="order-list"   cellpadding="5" cellspacing="5" style="border:0px solid #F0F0F0;border:1px solid #F4F4F4;">
                                <thead  >
                                    <tr>
                                        <td style="background-color:#F0F0F0;">Product Name</td>
                                        <td style="background-color:#F0F0F0;">Shipping Terms</td>
                                        <td style="background-color:#F0F0F0;">Port</td>
                                        <td style="background-color:#F0F0F0;">Unit Price</td>
                                        <td style="background-color:#F0F0F0;">Currency</td>                                        
                                        <td style="background-color:#F0F0F0;">MOQ</td>
                                        <td style="background-color:#F0F0F0;">Measurement</td>
                                        <td style="background-color:#F0F0F0;"></td>

                                    </tr>
                                </thead>
                                <tbody >
                                    <tr>
                                        <td>
                                            <input type="text" maxlength="20" name="pname" value="<?php echo $_REQUEST['pname'];?>" style="background-color:#F0F0F0; width:200px;" placeholder="Product Name"/>
                                        </td>
                                        <td>
                                            
                                <select class="input" name="shipping" style="width:90px; height:23px;padding:0px;">
                                
                                <option value="FOB" <?php if($_REQUEST['shipping']=="FOB"){ echo 'selected'; }?>>FOB</option>
                                <option value="CIF" <?php if($_REQUEST['shipping']=="CIF"){ echo 'selected'; }?>>CIF</option>
                                <option value="CFR" <?php if($_REQUEST['shipping']=="CFR"){ echo 'selected'; }?>>CFR</option>
                                </select>                                            
                                        </td>
                                        <td>
                                            <input type="text" maxlength="20" value="<?php echo $_REQUEST['port'];?>" name="port" style="background-color:#F0F0F0; width:180px;" placeholder="Port"/>
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $_REQUEST['uprice'];?>" id="uprice" name="uprice" style="background-color:#F0F0F0; width:80px;" placeholder="Price"/>
                                        </td>   
                                        <td>
                                            <select class="input" name="currency" style="width:90px;background-color:#F0F0F0;height:23px;padding:0px;">
                                            
                                            <option value="USD" <?php if($_REQUEST['currency']=="USD"){ echo 'selected'; }?>>USD</option>
                                            <option value="SGD" <?php if($_REQUEST['currency']=="SGD"){ echo 'selected'; }?>>SGD</option>
                                            <option value="EUR" <?php if($_REQUEST['currency']=="EUR"){ echo 'selected'; }?>>EUR</option>
                                            <option value="MYR" <?php if($_REQUEST['currency']=="MYR"){ echo 'selected'; }?>>MYR</option>
                                            </select>                                              
                                        </td>                                           
                                        <td>
                                            <input type="text" name="moq" id="moq" value="<?php echo $_REQUEST['moq'];?>" style="background-color:#F0F0F0; width:80px;" placeholder="MOQ"/>
                                        </td>
                                        <td>
                                            <select class="input" name="measurement" style="width:200px;height:23px; padding:0px;">
                                             
                                <option value="Metric Ton/Metric Tons" <?php if($_REQUEST['measurement']=="Metric Ton/Metric Tons"){ echo 'selected'; }?>>Metric Ton/Metric Tons</option>
                                <option value="Boxes" <?php if($_REQUEST['measurement']=="Boxes"){ echo 'selected'; }?>>Boxes</option>
                                <option value="Kilograms" <?php if($_REQUEST['measurement']=="Kilograms"){ echo 'selected'; }?>>Kilograms</option>
                                <option value="20' Container" <?php if($_REQUEST['measurement']=="20' Container"){ echo 'selected'; }?>>20' Container</option>
                                <option value="40' Container" <?php if($_REQUEST['measurement']=="40' Container"){ echo 'selected'; }?>>40' Container</option>
                                            </select>                                        
                                        </td>                                                                                                                      
                                        <td> <input type="button" class="ibtnDel" disabled  value="X" ></td>
                                    </tr>
                                    
                                    <?php if($_POST['submit']=='Submit'){ ?>
<?php for($i=1;$i<=4;$i++){
		if($_REQUEST['pname'.$i]){
	?>
<tr>
<td><input type="text" style="background-color:#F0F0F0; width:200px;" value="<?php echo $_REQUEST['pname'.$i];?>" name="pname<?php echo $i;?>" placeholder="Product Name"/></td>
<td>
<select class="input" name="shipping<?php echo $i;?>" style="width:90px; height:23px;padding:0px;">       
<option value="FOB" <?php if($_REQUEST['shipping'.$i]=="FOB"){ echo 'selected'; }?>>FOB</option>
<option value="CIF" <?php if($_REQUEST['shipping'.$i]=="CIF"){ echo 'selected'; }?>>CIF</option>
<option value="CFR" <?php if($_REQUEST['shipping'.$i]=="CFR"){ echo 'selected'; }?>>CFR</option>
</select>
</td>
<td><input type="text" style="background-color:#F0F0F0; width:180px;" value="<?php echo $_REQUEST['port'.$i];?>" name="port<?php echo $i;?>" placeholder="Port"/></td>
<td><input type="text" style="background-color:#F0F0F0; width:80px;" value="<?php echo $_REQUEST['uprice'.$i];?>" name="uprice<?php echo $i;?>" placeholder="Price"/></td>
<td><select class="input" name="currency<?php echo $i;?>" style="width:90px;background-color:#F0F0F0;padding:0px; height:23px;">        
    <option value="USD" <?php if($_REQUEST['currency'.$i]=="USD"){ echo 'selected'; }?>>USD</option>
    <option value="SGD" <?php if($_REQUEST['currency'.$i]=="SGD"){ echo 'selected'; }?>>SGD</option>
    <option value="EUR" <?php if($_REQUEST['currency'.$i]=="EUR"){ echo 'selected'; }?>>EUR</option>
    <option value="MYR" <?php if($_REQUEST['currency'.$i]=="MYR"){ echo 'selected'; }?>>MYR</option>
</select></td>    		
<td><input type="text" style="background-color:#F0F0F0; width:80px;" name="moq<?php echo $i;?>" value="<?php echo $_REQUEST['moq'.$i];?>" placeholder="MOQ"/></td>		
<td><select class="input" name="measurement<?php echo $i;?>" style="width:200px;height:23px; padding:0px;">      
      <option value="Metric Ton/Metric Tons" <?php if($_REQUEST['measurement'.$i]=="Metric Ton/Metric Tons"){ echo 'selected'; }?>>Metric Ton/Metric Tons</option>
      <option value="Boxes" <?php if($_REQUEST['measurement'.$i]=="Boxes"){ echo 'selected'; }?>>Boxes</option>
      <option value="Kilograms" <?php if($_REQUEST['measurement'.$i]=="Kilograms"){ echo 'selected'; }?>>Kilograms</option>
      <option value="20' Container" <?php if($_REQUEST['measurement'.$i]=="20' Container"){ echo 'selected'; }?>>20' Container</option>
      <option value="40' Container" <?php if($_REQUEST['measurement'.$i]=="40' Container"){ echo 'selected'; }?>>40' Container</option>	
</select>
</td>	
<td align="left"><input type="button" class="ibtnDel"  value="X" ></td>
</tr>   
<?php } } ?>  	 
									<?php } ?>
                                    
                                </tbody>
                                <tfoot>
                                     <tr>
                                        <td colspan="8" style="text-align: left;">
                                            <input type="button" id="addrow" value="Add More" />
                                        </td>
                                    </tr> 
                                    
                                </tfoot>
                            </table>                            
                            
                            </div>    
                            
				            <div class="form-group col-md-12" style="float:left;">
                            <label for="country" style="width:120px;"> Quotation Expiry   </label>	
				                <input type="text" value="<?php echo $_REQUEST['supplier_exp'];?>" name="supplier_exp" id="supplier_exp" class="input" readonly  placeholder="Pick the date" style="width:100px;">
				            </div>                                               
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Technical Info </label>
				                  <textarea name="ptinfo" id="ptinfo"  class=""  style="height:60px; width:862px;" placeholder="Product Technical Info"  onKeyPress="return checkAlphaCharacters(event)"><?php echo $_REQUEST['ptinfo'];?></textarea>
				            </div>                                                 
                             <div class="form-group col-md-12">
				                <label for="country" style="width:120px;float: left;"> Add Attachments  </label>
                                <input type="file" name="attachment"  class="input" style="width:320px;">
				            </div>
  
                             <div class="form-group col-md-12">
                             <label for="country" style="width:120px;"> Message   </label>	
				                
                                <textarea name="message1" id="message1"  class=""  style="height:60px; width:862px;" placeholder="Message"  onKeyPress="return checkAlphaCharacters(event)"><?php echo $_REQUEST['message1'];?></textarea>
				            </div>
				                                         
                                                                                                                            
                             
				               
                            <div class="form-group col-md-12">				               
<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
<label for='message'>Enter the code above here :</label><br>
<?php
if(!empty($errors)){
echo "<span id='elementId'><font style='font-size:11px;color:red;'>".nl2br($errors)."</font></span><br>";
}
?>
<input id="letters_code" name="letters_code" type="text"><br>
<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
 
				            </div>                     
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" style="float:left !important; margin:0px !important;" value="Submit">
				            </div>
				        </form>
	    			</div>
                    
                   
	    		</div>
	    		    			
	    	</div>  
            
            
            
    	</div>	
    </div><!--/#contact-page-->
	
	<?php include('footer.php');?><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="includes/jquery_003.js"></script>
	<script src="includes/jquery_004.js"></script>
	<script>
	ValidateRequirementForm2('#joinForm');
	</script>
    
    
               <script >
        $(function(){ 
			$('#supplier_exp').datepicker({
			//format: 'mm/dd/yyyy',
			format: 'dd-M-yyyy',
			startDate: "-0d",
			autoclose: true
		})	 
			 
		});	
        </script>
    
    <script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	document.joinForm.letters_code.value='';
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}

$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {

        counter = $('#myTable tr').length - 2;

        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" style="background-color:#F0F0F0; width:200px;" name="pname' + counter + '" placeholder="Product Name"/></td>';
		cols += '<td><select class="input" name="shipping' + counter + '" style="width:90px; height:23px;padding:0px;">';
        cols += '<option selected="selected" value="">Select</option>';
        cols += '<option value="FOB" selected>FOB</option>';
        cols += '<option value="CIF">CIF</option>';
        cols += '<option value="CFR">CFR</option>';
        cols += '</select>';
        cols += '</td>';
		cols += '<td><input type="text" style="background-color:#F0F0F0; width:180px;" name="port' + counter + '" placeholder="Port"/></td>';
		cols += '<td><input type="text" style="background-color:#F0F0F0; width:80px;" name="uprice' + counter + '" placeholder="Price"/></td>';
        cols += '<td><select class="input" name="currency' + counter + '" style="width:90px;background-color:#F0F0F0;padding:0px; height:23px;">';
        cols += '<option selected="selected" value="">--Select--</option>';
        cols += '<option value="USD" selected>USD</option>';
        cols += '<option value="SGD">SGD</option>';
        cols += '<option value="EUR">EUR</option>';
        cols += '<option value="MYR">MYR</option>';
        cols += '</select></td>';    		
		cols += '<td><input type="text" style="background-color:#F0F0F0; width:80px;" name="moq' + counter + '" placeholder="MOQ"/></td>';
		
		cols += '<td><select class="input" name="measurement' + counter + '" style="width:200px;height:23px; padding:0px;">';
        cols += '<option selected="selected" value="">Select</option>';
        cols += '<option value="Metric Ton/Metric Tons" selected>Metric Ton/Metric Tons</option>';
        cols += '<option value="Boxes">Boxes</option>';
        cols += '<option value="Kilograms">Kilograms</option>';
        cols += '<option value="20\' Container">20\' Container</option>';
        cols += '<option value="40\' Container">40\' Container</option>';		
        cols += '</select>';
        cols += '</td>';		

        cols += '<td align="left"><input type="button" class="ibtnDel"  value="X" ></td>';
        newRow.append(cols);
        if (counter == 4) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
        $("table.order-list").append(newRow);
        counter++;
    });

    $("table.order-list").on("change", 'input[name^="price"]', function (event) {
        calculateRow($(this).closest("tr"));
        calculateGrandTotal();                
    });


    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        calculateGrandTotal();
        
        counter -= 1
        $('#addrow').attr('disabled', false).prop('value', "Add Row");
    });


});

 $( function() {
    $('#moq').keyup(function(){
        if($(this).val().indexOf('.')!=-1){         
            if($(this).val().split(".")[1].length > 3){                
                if( isNaN( parseFloat( this.value ) ) ) return;
                this.value = parseFloat(this.value).toFixed(3);
            }  
         }            
         return this;  
    });
	
    $('#uprice').keyup(function(){
        if($(this).val().indexOf('.')!=-1){         
            if($(this).val().split(".")[1].length > 3){                
                if( isNaN( parseFloat( this.value ) ) ) return;
                this.value = parseFloat(this.value).toFixed(3);
            }  
         }            
         return this;  
    });	
	
}); 

/*function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}*/
$("input[name=sname]").keyup(function(){
  $(this).val( $(this).val().toUpperCase() );
});

(function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);

if(history.pushState) {
    history.pushState(null, null, '#elementId');
}
else {
    location.hash = '#elementId';
}

</script>
</body>
</html>