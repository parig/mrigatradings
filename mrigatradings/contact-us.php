<?php 
ob_start();
require 'config.php'; 

session_start();

if($_POST['submit']=='Submit'){
	
if(empty($_SESSION['letters_code'] ) || strcasecmp($_SESSION['letters_code'], $_POST['letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors = "The Verification code does not match!, Please enter valid Verification Code.";
		
$cname=$_REQUEST['cname'];
$companyname=$_REQUEST['companyname'];
$subject=$_REQUEST['subject'];
$address=nl2br($_REQUEST['address']);

if($_REQUEST['country_code']){
$country=explode('^',$_REQUEST['country_code']);
$country=$country[0];
}

 
if($_REQUEST['state_code1'])
{
	$only_state_code=', '.$_REQUEST['state_code1'];
}
 


$country  = $country.$only_state_code;

$email=$_REQUEST['email_id'];
$phoneno=$_REQUEST['ph_ccode2'].'-'.$_REQUEST['phoneno'];
$mobileno=$_REQUEST['ph_ccode1'].'-'.$_REQUEST['mobile_phone'];
$fax=$_REQUEST['ph_ccode3'].'-'.$_REQUEST['fax'];
$subject=$_REQUEST['subject'].' '.date('d-M-Y h:i:s A');
$cmessage=nl2br(stripslashes($_REQUEST['req_detail']));	
echo "<script type=\"text/javascript\">window.location = '#elementId';</script>";
	}
	
	if(empty($errors))
	{	
		include 'sendemail.php';
		
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
    <title>Contact | Mriga Tradings</title>
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
					<h2 class="title text-center">Contact</h2>    			    				    				
					 
					</div>            	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form novalidate="novalidate" name="joinForm" id="joinForm" method="post" action="contact-us.php">
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Contact Name  </label>
				                <input type="text" name="cname" style="width:320px;" class="input" value="<?php echo $_REQUEST['cname'];?>"  placeholder="Contact Person Name" onKeyPress="return checkAlphaCharacters(event)">
				            </div>
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Company Name  </label>
				                <input type="text" name="companyname" style="width:320px;" class="input" value="<?php echo $_REQUEST['companyname'];?>"  placeholder="Company Name"  onKeyPress="return checkAlphaCharacters(event)">
				            </div>      
                            <div class="form-group col-md-12" style="margin-left: 1px;">
                             <label for="country" style="width:120px;"> Address  </label>
				                <textarea name="address" id="address"  class=""  style="height:60px; width:320px;" placeholder="Address"  onKeyPress="return checkAlphaCharacters(event)"><?php echo $_REQUEST['address'];?></textarea>
				            </div>                                               
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
     
				            <div class="form-group col-md-12">		
                            <label for="country" style="width:120px;"> Mobile no.</label>		              
                                <input  placeholder="ISD" class="input w30px mr5px" name="ph_ccode1" id="isd_code" type="text" style="width:35px;"  value="<?php echo $_REQUEST['ph_ccode1'];?>">
	<input name="mobile_phone" placeholder="Mobile No." class="input w200px m5px" style="width:162px;" id="mobile_phone" onKeyPress="return isNumberKey(event);" minlength="10" maxlength="10" type="text" value="<?php echo $_REQUEST['mobile_phone'];?>">
				            </div>	    
                             <div class="form-group col-md-12" >
                             <label for="company" style="width:120px;"><span class="star"></span> Telephone no.</label>
                             <input  placeholder="ISD" class="input w30px mr5px" value="<?php echo $_REQUEST['ph_ccode2'];?>" name="ph_ccode2" id="isd2_code" type="text" style="width:35px;">
				                <input type="text" name="phoneno" class="input"  placeholder="Phone No" style="width:162px;" value="<?php echo $_REQUEST['phoneno'];?>">
				            </div>                      
				            <div class="form-group col-md-12" >
                            <label for="company" style="width:120px;"><span class="star"></span> Email </label>
				                <input type="email" name="email_id" id="email_id" style="width:320px;"  value="<?php echo $_REQUEST['email_id'];?>" class="input"  placeholder="Email Id">
				            </div>
                         

 
                              <div class="form-group col-md-12" >
                             <label for="country" style="width:120px;"> Fax no.</label>
                             <input  placeholder="ISD" class="input w30px mr5px" name="ph_ccode3" id="isd3_code" type="text" style="width:35px;"  value="<?php echo $_REQUEST['ph_ccode3'];?>" >	
				                <input type="text" name="fax" class="input"  placeholder="Fax" style="width:162px;"  value="<?php echo $_REQUEST['fax'];?>" >
				            </div>                            
                            
				            <div class="form-group col-md-12">
                            <label for="country" style="width:120px;"> Subject </label>	
				                <input type="text" name="subject" class="input"  placeholder="Subject" style="width:700px;"  value="<?php echo $_REQUEST['subject'];?>">
				            </div>

				            <div class="form-group col-md-12">
				                <textarea name="req_detail" id="req_detail"  class="" rows="15" style="height:100px;width:700px;" placeholder="Your Details Here"> <?php echo $_REQUEST['req_detail'];?> </textarea>
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
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				
	    				<address>
	    					<p><strong style="font-size:14px;">Mriga Tradings</strong></p>
                             
							<p>Block 249, Unit No: 06-60</p>
							<p>Street 21, Ang Mo Kio Avenue 2</p>
                            <p style="padding-bottom:5px;">Singapore - 560 249</p>
                            
							<p>Mobile: +65 93742295</p>
							<p>Telephone No: +65 66732737</p>
							<p>Email: <a href="mailto:info@mrigatradings.com.sg" style="color:#333;">info@mrigatradings.com.sg</a></p>
                             <p>&nbsp;</p>
                            <p><strong style="font-size:14px;">Working Hours</strong></p>
                            <p>Mon-Fri, Timing: 8 am- 6 pm,</p>
                            <p>Closed on Sat /Sun , Public Holidays</p>
                            
	    				</address>
	    			
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
    
    	<script src="includes/jquery_003.js"></script>
	<script src="includes/jquery_004.js"></script>
	<script>
	ValidateRequirementForm('#joinForm');
	</script>
    <script language='JavaScript' type='text/javascript'>
	
	
$("input[name=cname]").keyup(function(){
  $(this).val( $(this).val().toUpperCase() );
});
$("input[name=companyname]").keyup(function(){
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