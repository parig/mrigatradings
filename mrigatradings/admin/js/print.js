function Clickheretoprint()
{
var disp_setting="toolbar=no,location=no,directories=no,menubar=no,"; 
    disp_setting+="scrollbars=yes,width=1000, height=450, left=100, top=25";

var content_value = document.getElementById('print').innerHTML; 
var docprint=window.open("","",disp_setting); 
    docprint.document.open(); 
    docprint.document.write('<html><head><title>Healthy Living</title>'); 
	docprint.document.write('<link href="style.css" rel="stylesheet" type="text/css">');
	docprint.document.write('<link href="style2.css" rel="stylesheet" type="text/css">');
	docprint.document.write('<link href="css/style.css" rel="stylesheet" type="text/css">');
    docprint.document.write('</head><body >');
	docprint.document.write('<div  align="center"><img src="images/healthy-living-logo.gif" alt=""/></div>');
 // docprint.document.write('<div align="right" style="padding-right:25px;"><img src="images/print.jpg" alt="print" border="0" onclick="self.print()" /></div>');
	docprint.document.write('<div style="position:relative; float:left"><p style="padding-left:23px; padding-bottom:20px; padding-top:10px;" >' +                            content_value + '</p><div>');
docprint.document.write('<br><br><br></div></body></html>');
docprint.document.write('<div align="right" style="padding-right:25px;"><img src="images/print.jpg" alt="print" border="0" onclick="self.print()" /></div>');
docprint.document.close(); 
docprint.focus(); 
}


