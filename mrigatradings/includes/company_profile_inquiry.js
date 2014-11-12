function chk_login_company_profile(objfrm) {

	if (objfrm.user_name.value.length == 0) {
		
      alert("E-mail ID can't be left blank");
      objfrm.user_name.focus();
      return false;
   }
      
   if (objfrm.user_name.value.indexOf('@') == -1) {
      alert("Error in Email ID");
      objfrm.user_name.focus();
      return false;
   }
   if (objfrm.user_name.value.indexOf('.') == -1) {
      alert("Error in Email ID");
      objfrm.user_name.focus();
      return false;
   }
   if (objfrm.user_name.value.indexOf('@') !=  objfrm.user_name.value.lastIndexOf('@')) {
      alert("Please Specify One Email ID only");
      objfrm.user_name.focus();
      return false;
   }
        		
   if (objfrm.pass_word.value.length==0) {
      alert("Enter Your Password ");
      objfrm.pass_word.focus();
      return false; 
   } 
}
function companyProfileInquiry(loginChk, formChk) {
	
	if (document.joinForm.kword.value.length==0) {
		
		if (document.joinForm.select_type_name.value=="Service") {
			
			alert("Please Enter Your Service Name.");
		}
		else {
			
			alert("Please Enter Your Product Name.");
		}
		
		document.joinForm.kword.focus();
		return (false);	
	}  	
	
	if (document.joinForm.detailReq.value.length<10 || document.joinForm.detailReq.value.length>1000) {
		
    	if (document.joinForm.detailReq.value.length>1000){
	    	
	    	alert("Enter your Requirement Details [ maximum 1000 characters ] ");
		}
		else {
			
			alert("Enter your Requirement Details [ minimum 10 characters ] ");
		}
		
        document.joinForm.detailReq.focus();
        
        return (false);
	}
	
	if (document.joinForm.captcha.value.length==0) {		
		
		alert("Please Enter Confirmation Code");		
		document.joinForm.captcha.focus();
		return false;
	}	

	if (loginChk=="Y") {
		
		pp = chk_login_company_profile(document.joinForm);
		
		if (pp==false) {
			
			return false;
			
		}else{
			
			return true;
		}
	}
	else if (formChk=="Y") {
		
		pp = guestMemValid(document.joinForm);
		
		if (pp==false) {
			
			return false;
		}
		else {
			
	   		if (document.joinForm.bus_ty.options[document.joinForm.bus_ty.selectedIndex].value=="")  {
		   		alert("Pleas Select Nature of Business Type");
		   		document.joinForm.bus_ty.focus();
		   		return false;
	   		}
	   		if (document.joinForm.bus_ty.options[document.joinForm.bus_ty.selectedIndex].value!="x" && document.joinForm.comp_name.value.length==0) {	   		
		   		
				alert("Enter Company Name");	
		   		document.joinForm.comp_name.focus();
		   		return false;		   		
	   		}	   		
	   		if (document.joinForm.bus_ty.options[document.joinForm.bus_ty.selectedIndex].value!="x") {
		   		
	   			if (document.joinForm.product_desc.value.length<20) {
		   			
		   			alert("Enter Products/Services Detail [ minimum 20 characters ]");
	   				document.joinForm.product_desc.focus();
		   			return false;	 			
	   			}
	   			else if (document.joinForm.product_desc.value.length>350) {
		   			
		   			alert("Your Products / Services Detail should not exceed 350 Characters");	
	   				document.joinForm.product_desc.focus();
		   			return false;		   			
	   			}
	   		}
   		}
	}
	else {
		
		var pp="true";		
	}
}//end of enquiryValid