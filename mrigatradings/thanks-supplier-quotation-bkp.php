<?php require 'config.php'; 
session_start(); 
/* Set e-mail recipient */
$myemail="kumaravel.cm@madronesoft.com";

$sname=$_REQUEST['sname'];
$email_id=$_REQUEST['email_id'];
$mobile_phone=$_REQUEST['mobile_phone'];
$address=nl2br($_REQUEST['address']);
$ptinfo=nl2br($_REQUEST['ptinfo']);
$message1=nl2br($_REQUEST['message1']);

$currency=$_REQUEST['currency'];
$pname=$_REQUEST['pname'];
$shipping=$_REQUEST['shipping'];
$port=$_REQUEST['port'];
$uprice=$_REQUEST['uprice'];
$moq=$_REQUEST['moq'];
 

$message = '<!DOCTYPE html><html><head>';
$message.='</head>';
$message .= '<body><table style="border:1px solid #000;" cellspacing="0" cellpadding="5" >';
$message .= "<tr><td colspan='2' align='center' style='border-bottom:1px solid #000;'><img src='http://madronesoft.com/dev/v1/images/home/mriga-tradings.png' alt='Mriga-tradings' /></td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Supplier Name</strong> </td><td style='border-bottom:1px solid #000;'>" . $sname . "</td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Contact No</strong> </td><td style='border-bottom:1px solid #000;'>" . $mobile_phone . "</td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Email Id</strong> </td><td style='border-bottom:1px solid #000;'>" . $email_id . "</td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Address</strong> </td><td style='border-bottom:1px solid #000;'>" . $address . "</td></tr>";  
$message .= "<tr><td colspan='2' style='border-bottom:1px solid #000;border-right:1px solid #000;'><table id='myTable' class='order-list' cellpadding='5' style='border:0px solid #F0F0F0;' width='100%'>
                                <thead  >
                                    <tr>
                                        <td style='background-color:#F0F0F0;'>Product Name</td>
                                        <td style='background-color:#F0F0F0;'>Shipping Terms</td>
                                        <td style='background-color:#F0F0F0;'>Port</td>
                                        <td style='background-color:#F0F0F0;'>Unit Price</td>
										<td style='background-color:#F0F0F0;'>Currency</td>
                                        <td style='background-color:#F0F0F0;'>MOQ</td>
                                        
                                    </tr>
                                </thead>"; 
			
$message .= '<tbody >
				<tr>
					<td>
					   '.$pname.'
					</td>
					<td>
					  '.$shipping.'
					</td>
					<td>
					 '.$port.'
					</td>
					<td>
					 '.$uprice.'
					</td> 
					<td>
					 '.$currency.'
					</td>  					
					<td>
					'.$moq.'
					</td>                                                                                                                      
					 
				</tr>
			</tbody></table> </td></tr>';

 
 
 $message .= "<tr><td colspan='2' style='background: #eee;'><strong>Technical Info:</strong> </td></tr>";
$message .= "<tr><td colspan='2'>" . $ptinfo . "</td></tr>";

$message .= "<tr><td colspan='2' style='background: #eee;'><strong>Message:</strong> </td></tr>";
$message .= "<tr><td colspan='2'>" . $message1 . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
 

$to = 'tech-support@mrigatradings.com.sg';
//$to = 'parivallal.d@madronesoft.com';
$fromEmail = $email_id; 
$fromName = $sname; 
$subject = 'Supplier Quotation'; 
 
 
/* GET File Variables */ 
$tmpName = $_FILES['attachment']['tmp_name']; 
$fileType = $_FILES['attachment']['type']; 
$fileName = $_FILES['attachment']['name']; 
 
/* Start of headers */ 
$headers = "From: $Buyer_Name"; 
 
if (file($tmpName)) { 
  /* Reading file ('rb' = read binary)  */
  $file = fopen($tmpName,'rb'); 
  $data = fread($file,filesize($tmpName)); 
  fclose($file); 
 
  /* a boundary string */
  $randomVal = md5(time()); 
  $mimeBoundary = "==Multipart_Boundary_x{$randomVal}x"; 
 
  /* Header for File Attachment */
  $headers .= "\nMIME-Version: 1.0\n"; 
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
	
	<footer id="footer"><!--Footer-->
		 
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								
								<li><a href="contact-us.php">Contact Us</a></li>								
								<li><a href="faq.php">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privacy Policy</a></li>
								 
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>MRIGA Tradings</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="our-history.php">Company Information</a></li>
								<li><a href="careers.php">Career Possibilities</a></li>
								<li><a href="locator.php">Store Location</a></li>
								 
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							 
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2014. All Rights Reserved. Mriga Tradings.</p>
					 
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
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