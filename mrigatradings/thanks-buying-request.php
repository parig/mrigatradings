<?php require 'config.php'; 
session_start(); 
/* Set e-mail recipient */
//$myemail="kumaravel.cm@madronesoft.com";

date_default_timezone_set ("Asia/Singapore"); 
$script_tz = date_default_timezone_get();

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

if($_REQUEST['other_state'])
{
	$stateorcity=', '.$_REQUEST['other_state'];
}
if($_REQUEST['state_code1'])
{
	$only_state_code=', '.$_REQUEST['state_code1'];
}
if($_REQUEST['city_code'])
{
	$only_city_code=', '.$_REQUEST['city_code'];
}
if($_REQUEST['other_city'])
{
	$only_other_city=', '.$_REQUEST['other_city'];
}


$country  = $country.$stateorcity.$only_state_code.$only_city_code.$only_other_city;

$message = '<!DOCTYPE html><html><head>';
$message.='</head>';
$message .= '<body><table style="border:1px solid #000;" cellspacing="0" cellpadding="5">';
$message .= "<tr><td colspan='2' align='center' style='border-bottom:1px solid #000;'><img src='http://mrigatradings.com.sg/images/home/mriga-tradings-mail.png' alt='Mriga-tradings' /></td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Buyer Name</strong> </td><td style='border-bottom:1px solid #000;'>" . $Buyer_Name . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Email</strong> </td><td style='border-bottom:1px solid #000;'>" . $email_id . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Address</strong> </td><td style='border-bottom:1px solid #000;'>" . $address . "</td></tr>";  

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Country</strong> </td><td style='border-bottom:1px solid #000;'>" . $country . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Mobile No</strong> </td><td style='border-bottom:1px solid #000;'>" . $mobile_phone . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Telephone no</strong> </td><td style='border-bottom:1px solid #000;'>" . $l_phone . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Fax</strong> </td><td style='border-bottom:1px solid #000;'>" . $fax . "</td></tr>";


$message .= "<tr><td colspan='2' style='background: #eee;'><strong>Product Decription</strong> </td></tr>";
$message .= "<tr><td colspan='2'>" . $pdescription . "</td></tr>"; 
$message .= "<tr><td colspan='2' style='background: #eee;'><strong>Details</strong> </td></tr>";
$message .= "<tr><td colspan='2' style='border-bottom:1px solid #000;'>" . $Details . "</td></tr>"; 
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Request Quantity</strong> </td><td style='border-bottom:1px solid #000;'>" . $Qty . "</td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Measurement</strong> </td><td style='border-bottom:1px solid #000;'>" . $measurement . "</td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Request Expiry</strong> </td><td style='border-bottom:1px solid #000;'>" . $reg_exp . "</td></tr>"; 
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Supplier Location</strong> </td><td style='border-bottom:1px solid #000;'>" . $spl . "</td></tr>"; 
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Unit Price </strong> </td><td style='border-bottom:1px solid #000;'>" . $unit_price . "</td></tr>"; 
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Shipping Term </strong> </td><td style='border-bottom:1px solid #000;'>" . $shipping . "</td></tr>"; 
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Destination Port  </strong> </td><td style='border-bottom:1px solid #000;'>" . $dp . "</td></tr>"; 
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Currency  </strong> </td><td style='border-bottom:1px solid #000;'>" . $currency . "</td></tr>"; 
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Payment Term</strong> </td><td style='border-bottom:1px solid #000;'>" . $Payment_Terms . "</td></tr>";  
$message .= "</table>";
$message .= "</body></html>";
 

$to = 'tech-support@mrigatradings.com.sg';
//$to = 'd.parivallal@gmail.com';
$fromEmail = $email_id; 
$fromName = $Buyer_Name; 

 
$subject = 'Buying Request  '.date('d-M-Y h:i:s A'); 
 
 
/* GET File Variables */ 
$tmpName = $_FILES['attachment']['tmp_name']; 
$fileType = $_FILES['attachment']['type']; 
$fileName = $_FILES['attachment']['name']; 
 


//$headers = 'From: $Buyer_Name <'.$fromEmail.'>' . "\r\n";
 
//if (file($tmpName)) { 
if($_FILES['attachment']['size'] != '0'){	
  /* Reading file ('rb' = read binary)  */
  
  /* Start of headers */ 
//$headers = "From: $Buyer_Name"; 

$headers = "From: Mriga Tradings "."<info@mrigatradings.com.sg>" . "\r\n";
$headers .= "BCC: kumaravel.cm@madronesoft.com "."<kumaravel.cm@madronesoft.com>" . "\r\n";
//$headers .= 'BCC: parivallal.d@madronesoft.com <parivallal.d@madronesoft.com>' . "\r\n";
//$headers .= "<info@mrigatradings.com.sg>\n";
  
  $file = fopen($tmpName,'rb'); 
  $data = fread($file,filesize($tmpName)); 
  fclose($file); 
 
  /* a boundary string */
  $randomVal = md5(time()); 
  $mimeBoundary = "==Multipart_Boundary_x{$randomVal}x"; 
 
  /* Header for File Attachment */
  $headers .= "MIME-Version: 1.0\n"; 
  $headers .= "Content-Type: multipart/mixed;\n" ;
  $headers .= " boundary=\"{$mimeBoundary}\""; 
  
 
  /* Multipart Boundary above message */
  $message = "This is a multi-part message in MIME format.\n\n" . 
  "--{$mimeBoundary}\n" . 
  "Content-Type: text/html; charset=\"iso-8859-1\"\n" . 
  "Content-Transfer-Encoding: 7bit\n\n" . 
  $message . "\n\n"; 
 
  /* Encoding file data */
  $data = chunk_split(base64_encode($data)); 
 
  /* Adding attchment-file to message*/
  $message .= "--{$mimeBoundary}\n" . 
  "Content-Type: {$fileType};\n" . 
  " name=\"{$fileName}\"\n" . 
  "Content-Transfer-Encoding: base64\n\n" . 
  $data . "\n\n" . 
  "--{$mimeBoundary}--\n"; 
} 
else
{
	// To send HTML mail, the Content-type header must be set
/* Start of headers */ 
$headers = 'From: Mriga Tradings <info@mrigatradings.com.sg>' . "\r\n";
$headers .= 'BCC: kumaravel.cm@madronesoft.com <kumaravel.cm@madronesoft.com>' . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

}
 
$flgchk = mail ("$to", "$subject", "$message", "$headers"); 
 
$flgchk1 = mail ("$fromEmail", "$subject", "$message", "$headers");  
 
if($flgchk){
  $emsg="A email has been sent to: $to";
 }
else{
  $emsg="Error in Email sending";
}

/* Send the message using mail() function */
//mail($email, $subject, $message, $headers1); // Send to Submmiter
//mail($myemail, $subject, $message, $headers2); // send to admin

/* Redirect visitor to the thank you page */
//header('Location: thanks.html');
//exit();
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
</head><!--/head-->

<body>
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
					<h2 class="title text-center"> </h2>    			    				    				
					
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<p align="center"><strong>Thank you</strong></p>
	    				<div class="status alert alert-success">
                        <p><b>Your message was sent</b></p>
                        
                        <p>Your message was successfully sent!
                        Thank you for contacting us, we will reply
                        to your inquiry as soon as possible!</p>                        
                        </div>
				    	
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>Mriga Tradings.</p>
							<p>Block 249, Unit No: 06-60</p>
							<p>Street 21, Ang Mo Kio Avenue 2</p>
                            <p>Singapore - 560 249</p>                            
							<p>Mobile: +65 93742295</p>
							<p>Fax: +65 66732737</p>
							<p>Email: Jagan@mrigatradings.com.sg</p>
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
    <script>
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
    </script>
</body>
</html>