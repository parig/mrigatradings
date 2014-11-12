<?php //require 'config.php'; 
//session_start(); 
/* Set e-mail recipient */
//$myemail="kumaravel.cm@madronesoft.com";

//date_default_timezone_set ("Asia/Singapore"); 
//$script_tz = date_default_timezone_get();

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

$message = '<!DOCTYPE html><html><head>';
$message.='</head>';
$message .= '<body><table style="border:1px solid #000;" cellspacing="0" cellpadding="5">';
$message .= "<tr><td colspan='2' align='center' style='border-bottom:1px solid #000;'><img src='http://madronesoft.com/dev/v1/images/home/mriga-tradings-mail.png' alt='Mriga-tradings' /></td></tr>";
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
header('Location: thanks.php');
exit();
?>
 