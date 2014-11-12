<?php require 'config.php';  session_start();
date_default_timezone_set ("Asia/Singapore"); 
$script_tz = date_default_timezone_get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Newsletter Subscription | Mriga Tradings</title>
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
    		  
            
<div class="col-sm-12" style="min-height:215px;">    			   			
					<h2 class="title text-center">News Letter Subscription</h2>  
                    
<?php 
//echo basename($_SERVER['PHP_SELF']); 
if($_REQUEST['emailn'])
{
	$email = $_REQUEST['emailn'];
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	  {
	  echo "E-mail is not valid";
	  }
	else
	  {
	  //echo "E-mail is valid";
	  }
}
else
{
	 echo "Please enter valid email id to subscribe with us!";
}
?>                    
                    
                  
                    
 
<?php
if($_REQUEST['emailn'])
{
	$dupchk = mysql_query("select * from newsletter_subscriber  where  s_email='".$_REQUEST["emailn"]."'");
	if(mysql_num_rows($dupchk)==0) 
	{	
		$ins_sql="INSERT INTO  `newsletter_subscriber` (
		`s_id` ,
		`s_email` ,
		`s_status` ,
		`s_on`)
		VALUES (
		NULL ,  '".$_REQUEST['emailn']."',  '1',  '".date('Y-m-d h:i:s')."')";
		$pass_insert = mysql_query($ins_sql) or die(mysql_error()); 
$subject = 'A warm welcome from Mriga Tradings!';

$subject1 = 'New Subscriber'.' '.date('d-M-Y h:i:s A');	
/* Set e-mail recipient */
//$toadmin="parivallal.d@madronesoft.com";
$toadmin="subscription@mrigatradings.com.sg";

$email=$_REQUEST['emailn'];

$message = '<!DOCTYPE html><html><head>';
$message.='</head>';
$message .= '<body><table style="border:1px solid #000;" cellspacing="0" cellpadding="5">';
$message .= "<tr><td colspan='2' align='center' style='border-bottom:1px solid #000;'><img src='http://madronesoft.com/dev/v1/images/home/mriga-tradings-mail.png' alt='Mriga-tradings' /></td></tr>";
$message .= "<tr>
  <td colspan='2'>Hi,
Greetings!
    <br>
    <br>
    Thank you for your interest in Mriga Tradings.
    <br>
    <br>
    Welcome to the Mriga Tradings. Stay tuned as we share more about what we're working on and create a company that will bring new healthy fresh Fruits & Vegtables products to the world.
    <br>
    <br>
    For the latest news and updates, follow us on <a href='https://www.facebook.com/pages/Mriga-tradings/862240903786977?ref=br_tf' target='_blank'>Facebook</a>  and  <a href='https://twitter.com/mrigatradings' target='_blank'>Twitter</a>.
    <br>
    <br>
    You'll want to see what comes next. This is just the beginning.
    <br>
    <br>
    Warm Regards,<br>
    <br>
-Mriga Tradings </td></tr>";
$message .= "</table>";
$message .= "</body></html>";


// To send HTML mail, the Content-type header must be set
$headers1  = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
$headers1 .= 'From: Mriga Tradings <'.$toadmin.'>' . "\r\n";
//$headers1 .= 'BCC: kumaravel.cm@madronesoft.com' . "\r\n";



// To send HTML mail, the Content-type header must be set
$headers2  = 'MIME-Version: 1.0' . "\r\n";
$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
$headers2 .= 'From: '.$email.' <'.$email.'>' . "\r\n";
//$headers2 .= 'BCC: parivallal.d@madronesoft.com' . "\r\n";
$headers2 .= 'BCC: kumaravel.cm@madronesoft.com' . "\r\n";
/* Send the message using mail() function */
mail($email, $subject, $message, $headers1); // Send to Submmiter
mail($toadmin, $subject1, $message, $headers2); // send to admin		
		
		//echo 'Thank you for subscribing to Mriga Tradings...!';
	
?>

   <!--<form action="newsletter.php" class="searchform" method="post" id="frmnewsletter1" name="frmnewsletter1">  
        <input type="email" placeholder="Your email address" name="emailn"  value="<?php echo $_REQUEST['emailn'];?>" readonly />
        <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>								 
    </form>-->
    
      <p>
<strong>Product Updates</strong><br>
Subscribe to the list below to keep yourself up-to-date on new healthy fresh Fruits & Vegetables products so you can make sure you’re using all of the updated features.
 </p>
 <p>
<strong>Special Offers</strong><br>
Learn about new healthy fresh Fruits & Vegetables products and services and get a chance to take advantage of special discounts! .                    
                    </p>
                    
                    <p><strong>Thank you for subscribing to Mriga Tradings...!</strong></p>


<?php
	}else
	{
		echo '<center><strong>You are already subscribed...!</strong></center>';
	}
}
?>
 
                    			    				    				
					 
                    
 
<p>&nbsp;</p>
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
function refreshCaptcha()
{
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
</script>
</body>
</html>