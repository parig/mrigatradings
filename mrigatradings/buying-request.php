<?php 
ob_start();
require 'config.php'; session_start();
date_default_timezone_set ("Asia/Singapore"); 
$script_tz = date_default_timezone_get();


if($_POST['submit']=='Submit'){
	
if(empty($_SESSION['letters_code'] ) || strcasecmp($_SESSION['letters_code'], $_POST['letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors = "The Verification code does not match!, Please enter valid Verification Code.";
		
$Buyer_Name=$_REQUEST['Buyer_Name'];
$email_id=$_REQUEST['email_id'];
$mobile_phone=$_REQUEST['ph_ccode1'].'-'.$_REQUEST['mobile_phone'];

$l_phone=$_REQUEST['ph_ccode2'].'-'.$_REQUEST['phoneno'];

$fax=$_REQUEST['ph_ccode3'].'-'.$_REQUEST['fax'];

$address=nl2br(stripslashes($_REQUEST['address']));
$pdescription=nl2br(stripslashes($_REQUEST['pdescription']));
$Details=nl2br(stripslashes($_REQUEST['Details']));
$Qty=$_REQUEST['Qty'];

$measurement=$_REQUEST['measurement'];
$reg_exp=$_REQUEST['reg_exp'];
$spl=$_REQUEST['spl'];
$shipping=$_REQUEST['shipping'];
$unit_price=$_REQUEST['unit_price'];
$currency=$_REQUEST['currency'];
$dp=$_REQUEST['dp'];
$Payment_Terms=$_REQUEST['Payment_Terms']; 


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
		include 'mail-buying-request.php';
		
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
    <title>Buying Request | Mriga Tradings</title>
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
					<h2 class="title text-center">Buying <strong>Request</strong></h2>    			    				    				
					 
					</div>
			</div>   
    		<div class="row">  	
	    		<div class="col-sm-12">
	    			<div class="contact-form">
	    				
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form novalidate="novalidate" name="joinForm" id="joinForm" method="post" action="buying-request.php" enctype="multipart/form-data">
 							<div class="form-group col-md-12">
                            <label for="company" style="width:120px;"><span class="star"></span>  Buyer Name </label>
				                <input type="text" name="Buyer_Name" id="Buyer Name" style="width:320px;" class="input" value="<?php echo $_REQUEST['Buyer_Name'];?>"  placeholder="Buyer Name">
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
                                <input  placeholder="ISD" class="input w30px mr5px" value="<?php echo $_REQUEST['ph_ccode1'];?>" name="ph_ccode1" id="isd_code" type="text" style="width:35px;">
	<input name="mobile_phone" placeholder="Mobile No." class="input w200px m5px"  value="<?php echo $_REQUEST['mobile_phone'];?>" style="width:162px;" id="mobile_phone" onKeyPress="return isNumberKey(event);" minlength="10" maxlength="10" type="text">
				            </div>                                
                             <div class="form-group col-md-12"  >
                             <label for="company" style="width:120px;"><span class="star"></span> Telephone no.</label>
                             <input  placeholder="ISD" class="input w30px mr5px" value="<?php echo $_REQUEST['ph_ccode2'];?>" name="ph_ccode2" id="isd2_code" type="text" style="width:35px;">
				                <input type="text" name="phoneno" class="input" value="<?php echo $_REQUEST['phoneno'];?>"  placeholder="Phone No" style="width:162px;">
				            </div>
 
 							<div class="form-group col-md-12">
                            <label for="company" style="width:120px;"><span class="star"></span> Email </label>
				                <input type="email" name="email_id" id="email_id" value="<?php echo $_REQUEST['email_id'];?>" style="width:320px;" class="input"  placeholder="Email Id">
				            </div>
<!-- FROM Contact-->                            
                              <div class="form-group col-md-12" >
                             <label for="country" style="width:120px;"> Fax </label>
                             <input  placeholder="ISD" class="input w30px mr5px" value="<?php echo $_REQUEST['ph_ccode3'];?>" name="ph_ccode3" id="isd3_code" type="text" style="width:35px;">	
				                <input type="text" name="fax" class="input" value="<?php echo $_REQUEST['fax'];?>"  placeholder="Fax" style="width:162px;">
				            </div>

                            
                                                 
                        
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Product Description </label>
				                <input type="text"   name="pdescription" value="<?php echo $_REQUEST['pdescription'];?>" style="width:770px;" class="input"   onKeyPress="return checkAlphaCharacters(event)" placeholder="Solanceous Vegetables Product Type and Red Color Fresh Tomato">
				            </div>
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Details </label>
<textarea name="Details" id="Details"   class=""  style="height:130px; width:770px;"   placeholder="Dear Sir/Madam,

 We are inviting the quotation from the fresh vegetable suppliers from India/China/Vietnam/Malaysia/Indonesia.Please send us the MOQ, delivery time and the price list with FOB.
 
 With regards," ><?php echo $_REQUEST['Details'];?></textarea>
 
				            </div>                        
                             <div class="form-group col-md-12">
				                <label for="country" style="width:120px;float: left;"> Add Attachments  </label>
                                <input type="file" name="attachment" style="width:320px;" class="input">
				            </div>
  

                      
				           
                            
                             <div class="form-group col-md-12" style="float:left;">
                             <label for="country" style="width:120px;"> Request Quantity  </label>	
				                <input type="text" name="Qty" id="Qty1" value="<?php echo $_REQUEST['Qty'];?>" class="input"  placeholder="Qty" style="width:90px;">
				            </div>
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Measurement  </label>	
				                
                                <select class="input" name="measurement" style="width:190px;">
                                 
                                <option value="Metric Ton/Metric Tons" <?php if($_REQUEST['measurement']=="Metric Ton/Metric Tons"){ echo 'selected'; }?>>Metric Ton/Metric Tons</option>
                                <option value="Boxes" <?php if($_REQUEST['measurement']=="Boxes"){ echo 'selected'; }?>>Boxes</option>
                                <option value="Kilograms" <?php if($_REQUEST['measurement']=="Kilograms"){ echo 'selected'; }?>>Kilograms</option>
                                <option value="20' Container" <?php if($_REQUEST['measurement']=="20' Container"){ echo 'selected'; }?>>20' Container</option>
                                <option value="40' Container" <?php if($_REQUEST['measurement']=="40' Container"){ echo 'selected'; }?>>40' Container</option>
                                </select>
				            </div>
				            <div class="form-group col-md-12" style="float:left;">
                            <label for="country" style="width:120px;"> Request Expiry   </label>	
				                <input type="text" name="reg_exp" value="<?php echo $_REQUEST['reg_exp'];?>" id="reg_exp" class="input" readonly  placeholder="Pick the date" style="width:100px;">
				            </div>
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Supplier Location   </label>	
				                <input type="text" name="spl" value="<?php echo $_REQUEST['spl'];?>" class="input"  placeholder="Supplier Preferred Location" style="width:320px;">
				            </div>   
				            <div class="form-group col-md-12" style="float:right;">
                            <label for="country" style="width:120px;"> Shipping Term   </label>	
				              
                                <select class="input" name="shipping" style="width:90px;">
                                
                                <option value="FOB" <?php if($_REQUEST['shipping']=="FOB"){ echo 'selected'; }?>>FOB</option>
                                <option value="CIF" <?php if($_REQUEST['shipping']=="CIF"){ echo 'selected'; }?>>CIF</option>
                                <option value="CFR" <?php if($_REQUEST['shipping']=="CFR"){ echo 'selected'; }?>>CFR</option>
                                </select>
                                
				            </div>
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Unit Price  </label>	
				                <input type="text" name="unit_price"  value="<?php echo $_REQUEST['unit_price'];?>" id="unit_price1" class="input"  placeholder="Unit Price" style="width:90px;">
				            </div> 
				            <div class="form-group col-md-12" >
                            <label for="country" style="width:120px;">Currency  </label>				                
                                <select class="input" name="currency" style="width:90px;">
                                
                                <option value="USD" <?php if($_REQUEST['currency']=="USD"){ echo 'selected'; }?>>USD</option>
                                <option value="SGD" <?php if($_REQUEST['currency']=="SGD"){ echo 'selected'; }?>>SGD</option>
                                <option value="EUR" <?php if($_REQUEST['currency']=="EUR"){ echo 'selected'; }?>>EUR</option>
                                <option value="MYR" <?php if($_REQUEST['currency']=="MYR"){ echo 'selected'; }?>>MYR</option>
                                </select>                                
				            </div>
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Destination Port  </label>	
				                <input type="text" name="dp" class="input"  value="<?php echo $_REQUEST['dp'];?>"  placeholder="Destination Port" style="width:320px;">
				            </div>                             
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Payment Terms   </label>	
				               
                                <select class="input" name="Payment_Terms" style="width:130px;">
                                                  
                                <option value="L/C" <?php if($_REQUEST['Payment_Terms']=="L/C"){ echo 'selected'; }?>>L/C</option>
                                <option value="T/T" <?php if($_REQUEST['Payment_Terms']=="T/T"){ echo 'selected'; }?>>T/T</option>
                                <option value="D/P" <?php if($_REQUEST['Payment_Terms']=="D/P"){ echo 'selected'; }?>>D/P</option>
                                <option value="Western Union" <?php if($_REQUEST['Payment_Terms']=="Western Union"){ echo 'selected'; }?>>Western Union</option>
                                <option value="Money Gram" <?php if($_REQUEST['Payment_Terms']=="Money Gram"){ echo 'selected'; }?>>Money Gram</option>
                                 
                                </select>
                                
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
	 
    <script src="js/main.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    	<script src="includes/jquery_003.js"></script>
	<script src="includes/jquery_004.js"></script>
	<script>
	ValidateRequirementForm1('#joinForm');
	</script>
               <script >
        $(function(){ 
			$('#reg_exp').datepicker({
			//format: 'mm/dd/yyyy',
			format: 'dd-M-yyyy',
			startDate: "-0d",
			autoclose: true
		})	 
			 
		});	
        </script>
    <script language='JavaScript' type='text/javascript'>
  
 $( function() {
    $('#Qty1').keyup(function(){
        if($(this).val().indexOf('.')!=-1){         
            if($(this).val().split(".")[1].length > 3){                
                if( isNaN( parseFloat( this.value ) ) ) return;
                this.value = parseFloat(this.value).toFixed(3);
            }  
         }            
         return this;  
    });
	
    $('#unit_price1').keyup(function(){
        if($(this).val().indexOf('.')!=-1){         
            if($(this).val().split(".")[1].length > 3){                
                if( isNaN( parseFloat( this.value ) ) ) return;
                this.value = parseFloat(this.value).toFixed(3);
            }  
         }            
         return this;  
    });	
	
}); 

 
 
$("input[name=Buyer_Name]").keyup(function(){
  $(this).val( $(this).val().toUpperCase() );
});
function refreshCaptcha()
{
	document.joinForm.letters_code.value='';
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
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