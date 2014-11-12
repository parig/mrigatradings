<?php 
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

$message = '<!DOCTYPE html><html><head>';
$message.='</head>';
$message .= '<body><table style="border:1px solid #000;" cellspacing="0" cellpadding="5" >';
$message .= "<tr><td colspan='2' align='center' style='border-bottom:1px solid #000;'><img src='http://madronesoft.com/dev/v1/images/home/mriga-tradings-mail.png' alt='Mriga-tradings' /></td></tr>";
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Supplier Name</strong> </td><td style='border-bottom:1px solid #000;'>" . $sname . "</td></tr>"; 
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Email Id</strong> </td><td style='border-bottom:1px solid #000;'>" . $email_id . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Address</strong> </td><td style='border-bottom:1px solid #000;'>" . $address . "</td></tr>";  

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Country</strong> </td><td style='border-bottom:1px solid #000;'>" . $country . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Mobile No.</strong> </td><td style='border-bottom:1px solid #000;'>" . $mobile_phone . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Telephone no.</strong> </td><td style='border-bottom:1px solid #000;'>" . $l_phone . "</td></tr>";

$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Fax no.</strong> </td><td style='border-bottom:1px solid #000;'>" . $fax . "</td></tr>";

$message .= "<tr><td colspan='2' style='border-bottom:1px solid #000;border-right:1px solid #000;'><table id='myTable' class='order-list' cellpadding='5' style='border:0px solid #F0F0F0;' width='100%'>
                                <thead  >
                                    <tr>
                                        <td style='background-color:#F0F0F0;'>Product Name</td>
                                        <td style='background-color:#F0F0F0;'>Shipping Terms</td>
                                        <td style='background-color:#F0F0F0;'>Port</td>
                                        <td style='background-color:#F0F0F0;'>Unit Price</td>
										<td style='background-color:#F0F0F0;'>Currency</td>
                                        <td style='background-color:#F0F0F0;'>MOQ</td>
										<td style='background-color:#F0F0F0;'>Measurement</td>
                                    </tr>
                                </thead>"; 
			
$message .= '<tbody >';

if($pname)
{
	$message .= '<tr><td>'.$pname.'</td><td>'.$shipping.'</td><td>'.$port.'</td><td>'.$uprice.'</td><td>'.$currency.'</td><td>'.$moq.'</td><td>'.stripslashes($measurement).'</td></tr>';
}


 
for($i=1;$i<=4;$i++){

if($_REQUEST['pname'.$i])
{
	$message .= '<tr><td>'.$_REQUEST['pname'.$i].'</td><td>'.$_REQUEST['shipping'.$i].'</td><td>'.$_REQUEST['port'.$i].'</td><td>'.$_REQUEST['uprice'.$i].'</td><td>'.$_REQUEST['currency'.$i].'</td><td>'.$_REQUEST['moq'.$i].'</td><td>'.stripslashes($_REQUEST['measurement'.$i]).'</td></tr>';
}

}
 

$message .= '</tbody></table> </td></tr>';

 
$message .= "<tr><td style='border-bottom:1px solid #000;border-right:1px solid #000;'><strong>Quotation Expiry</strong> </td><td style='border-bottom:1px solid #000;'>" . $supplier_exp . "</td></tr>"; 
 
 $message .= "<tr><td colspan='2' style='background: #eee;'><strong>Technical Info</strong> </td></tr>";
$message .= "<tr><td colspan='2'>" . $ptinfo . "</td></tr>";

$message .= "<tr><td colspan='2' style='background: #eee;'><strong>Message</strong> </td></tr>";
$message .= "<tr><td colspan='2'>" . $message1 . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
// echo $message;
// exit;

$to = 'tech-support@mrigatradings.com.sg';

//$to = 'd.parivallal@gmail.com';
//$to = 'parivallal.d@madronesoft.com';
$fromEmail = $email_id; 
$fromName = $sname; 
$subject = 'Supplier Quotation  '.date('d-M-Y h:i:s A'); 
 
 
/* GET File Variables */ 
$tmpName = $_FILES['attachment']['tmp_name']; 
$fileType = $_FILES['attachment']['type']; 
$fileName = $_FILES['attachment']['name']; 
 
/* Start of headers */ 

 
if($_FILES['attachment']['size'] != '0'){
	
	//$headers = "From: $sname"; 
	//$headers = "From: Mriga Tradings <info@mrigatradings.com.sg>";
$headers = "From: Mriga Tradings "."<info@mrigatradings.com.sg>" . "\r\n";
$headers .= "BCC: kumaravel.cm@madronesoft.com "."<kumaravel.cm@madronesoft.com>" . "\r\n";	
//$headers .= "BCC: parivallal.d@madronesoft.com "."<parivallal.d@madronesoft.com>" . "\r\n";	
	
  /* Reading file ('rb' = read binary)  */
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
//echo $message;
//exit;
/* Redirect visitor to the thank you page */
header('Location: thanks.php');
exit();
?>
 