<?php
date_default_timezone_set ("Asia/Singapore"); 
$script_tz = date_default_timezone_get();
session_start();
/* Set e-mail recipient */
//$myemail="parivallal.d@madronesoft.com";
$myemail="tech-support@mrigatradings.com.sg";
/* Let's prepare the message for the e-mail */
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


$message = '<!DOCTYPE html><html><head>';
$message.='</head>';
$message .= '<body><table style="border:1px solid #000;" cellspacing="0" cellpadding="5">';
$message .= "<tr><td colspan='2' align='center' style='border-bottom:1px solid #000;'><img src='http://madronesoft.com/dev/v1/images/home/mriga-tradings-mail.png' alt='Mriga-tradings' /></td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Name</strong> </td><td style='border-bottom:1px solid #000;'>" . $cname . "</td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Email</strong> </td><td style='border-bottom:1px solid #000;'>" . $email . "</td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Company Name</strong> </td><td style='border-bottom:1px solid #000;'>" . $companyname . "</td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Address</strong> </td><td style='border-bottom:1px solid #000;'>" . $address . "</td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Country</strong> </td><td style='border-bottom:1px solid #000;'>" . $country . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Mobile no.</strong> </td><td style='border-bottom:1px solid #000;'>" . $mobileno . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Telephone no.</strong> </td><td style='border-bottom:1px solid #000;'>" . $phoneno . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Fax no.</strong> </td><td style='border-bottom:1px solid #000;'>" . $fax . "</td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Subject:</strong> </td><td style='border-bottom:1px solid #000;'>" . $subject . "</td></tr>"; 
$message .= "<tr><td colspan='2' style='background: #eee;'><strong>Message:</strong> </td></tr>";
$message .= "<tr><td colspan='2'>" . $cmessage . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>"; 

// To send HTML mail, the Content-type header must be set
$headers1  = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
$headers1 .= 'From: Mriga Tradings <'.$myemail.'>' . "\r\n";

// To send HTML mail, the Content-type header must be set
$headers2  = 'MIME-Version: 1.0' . "\r\n";
$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
$headers2 .= 'From: '.$cname.' <'.$email.'>' . "\r\n";
//$headers2 .= 'BCC: parivallal.d@madronesoft.com' . "\r\n";
$headers2 .= 'BCC: kumaravel.cm@madronesoft.com' . "\r\n";

/* Send the message using mail() function */
mail($email, $subject, $message, $headers1); // Send to Submmiter
mail($myemail, $subject, $message, $headers2); // send to admin

/* Redirect visitor to the thank you page */
header('Location: thanks.php');
exit();