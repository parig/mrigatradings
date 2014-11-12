var xmlHttp

// Start
function check_exiting_username(url) {
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request");
		return;
	}

	var username = document.getElementById('username').value;
	
	if(chktrim(username)=='') {
		
		alert("Please enter email.");
		document.getElementById('username').focus();
		return false;
	}
	
	/*var filter=/^.+@.+\..{2,3}$/;
	if(!(filter.test(username))) {
			
		alert("Please enter valid email.");
		document.getElementById('username').focus();
		return false;
	}*/	
	//var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   		
	if(reg.test(username) == false) {

		alert('Please enter valid email.');
		document.getElementById('username').focus();
		return false;
	}
	
	
	url=url+"&q="+username;
	//alert('url - '+url);
	
	document.getElementById('checking_span').style.display='';	
	document.getElementById('checking_span').innerHTML="Checking for registration";
	
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChangedEmail;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null)
}
// End


function stateChangedEmail() { 
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
		
		document.getElementById('checking_span').style.display='none';
		
		var ajax_result = xmlHttp.responseText;
		
		//alert('ajax_result - '+ajax_result);
		//var result = xmlHttp.responseText.replace(/\s/g,"");
		
		var arr_result = ajax_result.split("|");
		
		var result = arr_result[0].replace(/\s/g,"");
		
		var result1 = arr_result[1].replace(/\s/g,"");
				
		//alert(result1);
		
		if(result=='invalid') {
			
			alert("Please enter valid email.");
			document.getElementById('username').focus();
			return false;
		}
		else if(result=='non_exist') {
			
			document.getElementById('non_exist_email_id_container').innerHTML = document.getElementById('username').value;
			
			document.getElementById('confirm-usertype').style.display='none';
			
			document.getElementById('new-user').style.display='';			
			document.getElementById('existing-member').style.display='none';
			
			document.getElementById('action_id').value="member_reg";
			
			//$('#confirm-usertype').hide();			
			//$('#existing-member').show();			
			/*
			document.getElementById('non_exist_email_id_container').innerHTML = document.getElementById('username').value;			
			document.getElementById('enterEmail').style.display='none';
			document.getElementById('newUser').style.display='';			
			document.getElementById('existingUser').style.display='none';
			document.getElementById('submitButton').style.display='';			
			document.getElementById('action_id').value="member_reg";
			document.getElementById('display_code').style.display='';
			*/
		}
		else if(result=='exist') {
			
						
			document.getElementById('email_container').innerHTML = document.getElementById('username').value;
			
			document.getElementById('confirm-usertype').style.display='none';
			document.getElementById('new-user').style.display='none';
			document.getElementById('existing-member').style.display='';
			
			document.getElementById('action_id').value="member_login";
			
			/*
			document.getElementById('enterEmail').style.display='none';
			document.getElementById('newUser').style.display='none';
			document.getElementById('existingUser').style.display='';			
			document.getElementById('your_name').value="";			
			document.getElementById('action_id').value="member_login";
			document.getElementById('display_code').style.display='none';
			*/
			//password_row_id			
			/*
			if(result1) {				
				document.getElementById('password_row_id').style.display='none';				
				document.getElementById('login_message_p_id_1').style.display='none';
				document.getElementById('login_message_p_id_2').style.display='none';				
				document.getElementById('send_inq_error_msg').innerHTML= arr_result[1];				
				document.getElementById('send_inq_error_msg_row').style.display='';
			}
			else {				
				document.getElementById('password_row_id').style.display='';
				document.getElementById('send_inq_error_msg_row').style.display='none';				
				document.getElementById('login_message_p_id_1').style.display=''
				document.getElementById('login_message_p_id_2').style.display=''
				
				document.getElementById('submitButton').style.display='';
				document.getElementById('submitButton').focus();
			}*/			
		}
	}
}



function inq_form_validate(frm) {
	
	if(chktrim(frm.kword.value).length=="0") {
			
		alert("Please Enter Your Subject");
		frm.kword.focus();
		return false;
	}
	
	if (chktrim(frm.detail_req1.value).length==0 || chktrim(frm.detail_req1.value).length<50) {
		
    	alert("Please Enter Your Requirement Details [ Minimum 50 Characters ]");
        frm.detail_req1.focus();
        return false;
	}
		
	if (chktrim(frm.detail_req1.value).length>1000) {
		
    	alert("Please Enter Your Requirement Details [ Maximum 1000 Characters ]");
        frm.detail_req1.focus();
        return false;
	}

    if (frm.login_type.value=='false') {
	    
	    if (document.getElementById('existing-member').style.display=='') {
		    
		    document.getElementById('action_id').value="member_login";
		    
			if (frm.pass_word.value.length==0) {
				
		    	alert("Please Enter Your Password");
		        frm.pass_word.focus();
		        return false;
			}
	    }
	    else {
		    
		    document.getElementById('action_id').value="member_reg";
		    
		    var validate_name =/^([a-zA-Z. ])+$/;
		    
		    if (chktrim(frm.your_name.value).length==0) {
			
		    	alert("Please Enter Your Name");
		        frm.your_name.focus();
		        return false;
			}
			
			if ((!validate_name.test(chktrim(frm.your_name.value)))) {
				
				alert("Please Enter Valid Name");
		        frm.your_name.focus();
		        return false;
			}
			
			if (!frm.comp_name_valid.checked) {
				
		    	if (chktrim(frm.comp_name.value).length==0) {
			
			    	alert("Please Enter Company Name");
			        frm.comp_name.focus();
			        return false;
				}
				
				if ((!validate_name.test(chktrim(frm.comp_name.value)))) {
				
					alert("Please Enter Valid Company Name");
			        frm.comp_name.focus();
			        return false;
				}
			}
						
			if (frm.country.options[frm.country.selectedIndex].value=="x") {
				
			  	alert("Please Select Your Country.");
			    frm.country.focus();
			    return false;
			}
			
			if(frm.country.options[frm.country.selectedIndex].value=="IN^91" && frm.state_code.options[frm.state_code.selectedIndex].value=='') {
				
				alert("Please Select State.");
			    frm.state_code.focus();
			    return false;
			}
			
			
			if (chktrim(frm.mobile_phone.value).length==0) {
	    
			    alert("Please Enter Mobile Number.");
			    frm.mobile_phone.focus();
				return false;
			}
			
						
			var mobile_phone_reg = /^[0-9\/,-]+$/;
			
			if(chktrim(frm.mobile_phone.value).length>0) {
			    
			    if(!(mobile_phone_reg.test(frm.mobile_phone.value))) {
				
					alert("Please enter valid mobile number.Do not enter alphabet or special characters. Special Characters allowed only [-/,]");
					frm.mobile_phone.focus();
					return false;
				}
				if(chktrim(frm.mobile_phone.value).length<10 && frm.country.options[frm.country.selectedIndex].value=="IN^91") {
					
					alert("Mobile Number Should be 10 digits at least.");
				    frm.mobile_phone.focus();
					return false;
				}
				else if(chktrim(frm.mobile_phone.value).length<3 && frm.country.options[frm.country.selectedIndex].value!="IN^91") {
					
					alert("Mobile Number Should be 3 digits at least.");
				    frm.mobile_phone.focus();
					return false;
				}
		    }
		    
			if (chktrim(frm.captcha.value).length==0) {
	    
			    alert("Please Enter Security Code Displayed on the Image.");
			    frm.captcha.focus();
				return false;
			}
			if (chktrim(frm.captcha.value)!=chktrim(frm.captch_value.value)) {
	    
			    alert("Security Code does not match with the Displayed Code.");
			    frm.captcha.focus();
				return false;
			}
		 }
	 }
}


function business_detl_valid (frm) {
	
	if(frm.address.value.length==0) {
		
		alert("Please Enter Your Company Address");
		frm.address.focus();
		return false;		
	}
	
	var chk_bus_catg = document.getElementsByName('bus_category[]');
	
	var Checked = false;
	
	for (var i=0; i<chk_bus_catg.length; i++) {
			
		if (chk_bus_catg[i].checked) {
			
			Checked = true;
			break;
		}
	}
	
	if (Checked==false) {
		
		chk_bus_catg[0].focus();
			
		alert("Please Check Your Business Type.");
		
		return false;
	}
	
	if (frm.product_desc.value.length==0 || frm.product_desc.value.length<50) {
			   	 
   			 alert("Enter Products / Services offered by you [ Minimum 50 Characters ]");		   			
			 frm.product_desc.focus();
   			 return false;	 			
	}
	if (frm.product_desc.value.length>350) {
			
   			alert("Enter Products / Services offered by you [ Maximum 350 Characters ]");	
			frm.product_desc.focus();
   			return false;		   			
	}
}

function stateChangedEmail_old31jan() { 
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
		
		document.getElementById('checking_span').style.display='none';
		
		var ajax_result = xmlHttp.responseText;
		
		//alert('ajax_result - '+ajax_result);

		//var result = xmlHttp.responseText.replace(/\s/g,"");
		
		var arr_result = ajax_result.split("|");
		
		var result = arr_result[0].replace(/\s/g,"");
		
		var result1 = arr_result[1].replace(/\s/g,"");
		
		if(result=='invalid') {
			
			alert("Please enter valid email.");
			document.getElementById('username').focus();
			return false;
		}
		else if(result=='non_exist') {
			
			document.getElementById('non_exist_email_id_container').innerHTML = document.getElementById('username').value;
			
			document.getElementById('enterEmail').style.display='none';
			document.getElementById('newUser').style.display='';			
			document.getElementById('existingUser').style.display='none';
			document.getElementById('submitButton').style.display='';
			
			document.getElementById('action_id').value="member_reg";
			
			document.getElementById('display_code').style.display='';
		}
		else if(result=='exist') {
			
			document.getElementById('email_container').innerHTML = document.getElementById('username').value;
			
			document.getElementById('enterEmail').style.display='none';
			document.getElementById('newUser').style.display='none';
			document.getElementById('existingUser').style.display='';
			
			document.getElementById('your_name').value="";
			
			document.getElementById('action_id').value="member_login";
			document.getElementById('display_code').style.display='none';
			
			//password_row_id
			
	
			if(result1) {
				
				document.getElementById('password_row_id').style.display='none';
				
				document.getElementById('login_message_p_id_1').style.display='none';
				document.getElementById('login_message_p_id_2').style.display='none';
				
				document.getElementById('send_inq_error_msg').innerHTML= arr_result[1];
				
				document.getElementById('send_inq_error_msg_row').style.display='';
			}
			else {
				
				document.getElementById('password_row_id').style.display='';
				document.getElementById('send_inq_error_msg_row').style.display='none';
				
				document.getElementById('login_message_p_id_1').style.display='';
				document.getElementById('login_message_p_id_2').style.display='';
				
				document.getElementById('submitButton').style.display='';
				document.getElementById('submitButton').focus();
			}
			
		}
	}
}

function GetXmlHttpObject() { 
	var objXMLHttp=null;
	if (window.XMLHttpRequest) {
		objXMLHttp=new XMLHttpRequest();
	}
	else if (window.ActiveXObject) {
		objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return (objXMLHttp);
} 

function display_main_form() {
	
	document.getElementById('enterEmail').style.display='';
	document.getElementById('username').value="";
	document.getElementById('username').focus();

	document.getElementById('newUser').style.display='none';
	document.getElementById('existingUser').style.display='none';
	document.getElementById('submitButton').style.display='none';
	
	if(document.getElementById('err_msg_row')) {
		
		document.getElementById('err_msg_row').style.display='none';
	}
	
}
function chk_detail_req(id,len,counter_id) {
	
	if(document.getElementById(counter_id)) {
		
		document.getElementById(counter_id).innerHTML = parseInt(len-document.getElementById(id).value.length)
	}
	
	if(document.getElementById(id).value.length>len)	 {
	
		document.getElementById(id).value = document.getElementById(id).value.substring(0, len);
	}
}
function country_onchange_func(formobj,val) {
	
	if(val!='x') { 
		formobj.phone_isd.value=val.substr(3,val.length);
	}
	var myarray = val.split("^"); 
	
	if(myarray[0]=='IN')  {
		
		formobj.state_code.style.display='';
		formobj.state.style.display='none';
	}
	else{
		
		formobj.state_code.style.display='none';
		formobj.state.style.display='';
		
	}
}

function inq_form_validate_old_31jan(frm) {
	
	if(chktrim(frm.kword.value).length=="0") {
			
		alert("Please Enter Your Subject");
		frm.kword.focus();
		return false;
	}
	
	if (chktrim(frm.detail_req1.value).length==0 || chktrim(frm.detail_req1.value).length<50) {
		
    	alert("Please Enter Your Requirement Details [ Minimum 50 Characters ]");
        frm.detail_req1.focus();
        return false;
	}
		
	if (chktrim(frm.detail_req1.value).length>1000) {
		
    	alert("Please Enter Your Requirement Details [ Maximum 1000 Characters ]");
        frm.detail_req1.focus();
        return false;
	}

    if (frm.login_type.value=='false') {
	    
	    if (document.getElementById('existingUser').style.display=='') {
		    
		    document.getElementById('action_id').value="member_login";
		    
			if (frm.pass_word.value.length==0) {
				
		    	alert("Please Enter Your Password");
		        frm.pass_word.focus();
		        return false;
			}
	    }
	    else {
		    
		    document.getElementById('action_id').value="member_reg";
		    
		    if (chktrim(frm.your_name.value).length==0) {
			
		    	alert("Please Enter Your Name");
		        frm.your_name.focus();
		        return false;
			}
			
			if(frm.bus_ty.options[frm.bus_ty.selectedIndex].value=="") {
				
				alert("Please Select Business Type.");
			    frm.bus_ty.focus();
			    return false;
			}
			
			if (frm.bus_ty.options[frm.bus_ty.selectedIndex].value!="x" && frm.bus_ty.options[frm.bus_ty.selectedIndex].value!="")  {
								
				if (chktrim(frm.comp_name.value).length==0) {
			
			    	alert("Please Enter Company Name.");
			        frm.comp_name.focus();
			        return false;
				}
			}
			
			if (frm.country.options[frm.country.selectedIndex].value=="x") {
				
			  	alert("Please Select Your Country.");
			    frm.country.focus();
			    return false;
			}
			
			if(frm.country.options[frm.country.selectedIndex].value=="IN^91" && frm.state_code.options[frm.state_code.selectedIndex].value=='') {
				
				alert("Please Select State.");
			    frm.state_code.focus();
			    return false;
			}
			
			
			/*
			if (chktrim(frm.address.value).length==0) {
			
		    	alert("Please Enter Address");
		        frm.address.focus();
		        return false;
			}
			*/
			
			if (chktrim(frm.phone.value)=='Phone Number' && chktrim(frm.mobile_phone.value)=='Mobile Number') {
	    
			    alert("Please Enter Phone / Mobile Number.");
			    frm.mobile_phone.focus();
				return false;
			}
			if (chktrim(frm.phone.value)!='Phone Number' && chktrim(frm.phone_std.value)=='STD') {
			    
			    alert("Please Enter STD Code.");
			    frm.phone_std.focus();
				return false;
			}
			
			var mobile_phone_reg = /^[0-9\/,-]+$/;
			
			if(frm.phone.value!='Phone Number') {
				
				if(!(mobile_phone_reg.test(frm.phone.value))) {
				
					alert("Please enter valid phone.Do not enter alphabet or special characters. Special Characters allowed only [-/,]");
					frm.phone.focus();
					return false;
				}
				
				if (frm.phone.value.length<5) {
			   
				   alert("Phone Number Should be 5 Digits at least.");
				   frm.phone.focus();
				   return false;
			    }
		    }
			if(chktrim(frm.mobile_phone.value)!='Mobile Number') {
			    
			    if(!(mobile_phone_reg.test(frm.mobile_phone.value))) {
				
					alert("Please enter valid mobile number.Do not enter alphabet or special characters. Special Characters allowed only [-/,]");
					frm.mobile_phone.focus();
					return false;
				}
				if(chktrim(frm.mobile_phone.value).length<10 && frm.country.options[frm.country.selectedIndex].value=="IN^91") {
					
					alert("Mobile Number Should be 10 digits at least.");
				    frm.mobile_phone.focus();
					return false;
				}
				else if(chktrim(frm.mobile_phone.value).length<3) {
					
					alert("Mobile Number Should be 3 digits at least.");
				    frm.mobile_phone.focus();
					return false;
				}
		    }
		    
		    /*
		    if (frm.password.value.length==0) {
				
		    	alert("Please Enter Your Password");
		        frm.password.focus();
		        return false;
			}
			if (frm.password.value.length<6) {
				
		    	alert("Password must be 6 characters");
		        frm.password.focus();
		        return false;
			}
			var validate_password =/^([a-zA-Z0-9])+$/;
	    	
			if (!validate_password.test(frm.password.value)) {
		        alert("Please do not use Special Character in Password. Use only alpha numeiric.");
		        frm.password.focus();
		        return false;
			}
			if (frm.cnfm_password.value.length==0) {
				
		    	alert("Please Enter Confirm Password");
		        frm.cnfm_password.focus();
		        return false;
			}
			if ((frm.password.value) != (frm.cnfm_password.value)) {
			    
		        alert("Your Password & Confirm password doesn't match");
		        frm.password.focus();
		        return false;
		    }
		    */
		    
		    
			if (frm.bus_ty.options[frm.bus_ty.selectedIndex].value!="x" && frm.bus_ty.options[frm.bus_ty.selectedIndex].value!="")  {
				
			   	if (chktrim(frm.product_desc.value).length==0 || chktrim(frm.product_desc.value).length<50) {
				   	 
		   			 alert("Enter Products/Services Detail [ Minimum 50 Characters ]");		   			
					 frm.product_desc.focus();
		   			 return false;	 			
				}
				if (frm.product_desc.value.length>350) {
					
		   			alert("Enter Products/Services Detail [ Maximum 350 Characters ]");	
					frm.product_desc.focus();
		   			return false;		   			
				}
			}
			
			if (chktrim(frm.captcha.value).length==0) {
	    
			    alert("Please Enter Security Code Displayed on the Image.");
			    frm.captcha.focus();
				return false;
			}
			if (chktrim(frm.captcha.value)!=chktrim(frm.captch_value.value)) {
	    
			    alert("Security Code does not match with the Displayed Code.");
			    frm.captcha.focus();
				return false;
			}
		 }
	 }
}
function disableEnterKey(e) {
      var key;
 
     if(window.event)
           key = window.event.keyCode;     //IE
      else
           key = e.which;     //firefox
 
     if(key == 13)
           return false;
      else
           return true;
}


function check_existing_username_fdb_cont(url) {
	
	xmlHttp=GetXmlHttpObject();
	
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request");
		return;
	}

	var username = document.getElementById('username').value;
	
	if(chktrim(username)=='') {
		
		alert("Please enter email.");
		document.getElementById('username').focus();
		return false;
	}
	
	var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   		
	if(reg.test(username) == false) {

		alert('Please enter valid email.');
		document.getElementById('username').focus();
		return false;
	}
	
	
	url=url+"&q="+username;
	//alert('url - '+url);
	
	document.getElementById('checking_span').style.display='';	
	document.getElementById('checking_span').innerHTML="Checking for registration";
	
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChangedEmailFdCt;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null)
}
// End


function stateChangedEmailFdCt() { 
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
		
		document.getElementById('checking_span').style.display='none';
		
		var ajax_result = xmlHttp.responseText;
		//alert('ajax_result - '+ajax_result);
		
		//var result = xmlHttp.responseText.replace(/\s/g,"");
		
		var arr_result = ajax_result.split("|");
		
		var result = arr_result[0].replace(/\s/g,"");
		
		var result1 = arr_result[1].replace(/\s/g,"");
		
		
		
		if(result=='invalid') {
			
			alert("Please enter valid email.");
			document.getElementById('username').focus();
			return false;
		}
		else if(result=='non_exist') {
			
			document.getElementById('non_exist_email_id_container').innerHTML = document.getElementById('username').value;			
			document.getElementById('enterEmail').style.display='none';
			document.getElementById('newUser').style.display='';			
			document.getElementById('existingUser').style.display='none';
			document.getElementById('submitButton').style.display='';			
			document.getElementById('action_id').value="member_reg";
			document.getElementById('display_code').style.display='';
			
		}
		else if(result=='exist') {
			
			document.getElementById('email_container').innerHTML = document.getElementById('username').value;
			
			document.getElementById('enterEmail').style.display='none';
			document.getElementById('newUser').style.display='none';
			document.getElementById('existingUser').style.display='';			
			document.getElementById('your_name').value="";			
			document.getElementById('action_id').value="member_login";
			document.getElementById('display_code').style.display='none';
			
			//password_row_id
			
			if(result1) {
				
				document.getElementById('password_row_id').style.display='none';
				
				document.getElementById('login_message_p_id_1').style.display='none';
				document.getElementById('login_message_p_id_2').style.display='none';
				
				document.getElementById('send_inq_error_msg').innerHTML= arr_result[1];
				
				document.getElementById('send_inq_error_msg_row').style.display='';
			}
			else {
				
				document.getElementById('password_row_id').style.display='';
				document.getElementById('send_inq_error_msg_row').style.display='none';
				
				document.getElementById('login_message_p_id_1').style.display='';
				document.getElementById('login_message_p_id_2').style.display='';
				
				document.getElementById('submitButton').style.display='';
				document.getElementById('submitButton').focus();
			}
			
		}
	}
}


function checkExistingUser(url, email) {
	
	var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   		
	if(reg.test(email) == false) {

		return false;
	}
	
	if(document.domain=='192.168.1.106') {
		
		var imgae_url ="http://192.168.1.106/static/";
	}
	else {
		var imgae_url ="http://static.exportersindia.com/";
	}
	
	
	document.getElementById('loader').innerHTML = '<img src="'+imgae_url+'images/loading.gif" />';	
	
	action_url = url;
	
	url=url+"&email="+email;
	
	url=url+"&sid="+Math.random();
	
	$.ajax({
		url: url,
		method : "POST",
		success:function(result){
		
			var arr_result = result.split("|");	
			if(arr_result[0].replace(/^\s+|\s+$/g, '') == 'exist'){
				
				$("#your_name").val(arr_result[3].replace(/^\s+|\s+$/g, ''));
				$("#gender_type").val(arr_result[2].replace(/^\s+|\s+$/g, ''));
				$("#comp_name").val(arr_result[4].replace(/^\s+|\s+$/g, ''));	
				$("#country").val(arr_result[5].replace(/^\s+|\s+$/g, ''));	
				
				if(arr_result[5].replace(/^\s+|\s+$/g, '') == 'IN^91'){
					$("#state-container").show();
					$("#city-container").show();
					$("#state_code1").val(arr_result[6].toUpperCase());
					
					if(arr_result[6].trim != '')
					{
						$("#other-state-container").hide();
					}
					else{
						$("#other-state-container").show();
						$("#other_state").val(arr_result[10].replace(/^\s+|\s+$/g, ''));
					}
					
					action_url = action_url.replace("check_existing_user", "get_city_list");
				
					if(arr_result[7].replace(/^\s+|\s+$/g, '') >0 && arr_result[7].replace(/^\s+|\s+$/g, '') != '9999'){
						$("#city-container").show();
						getCityStateWise(action_url,arr_result[6].replace(/^\s+|\s+$/g, ''),arr_result[7].replace(/^\s+|\s+$/g, ''),'ajax');
						$("#city").val(arr_result[7].replace(/^\s+|\s+$/g, ''));
						
					}else{
						$("#city-container").show();
						getCityStateWise(action_url,arr_result[6].replace(/^\s+|\s+$/g, ''),arr_result[7].replace(/^\s+|\s+$/g, ''),'ajax');
						$("#city").val('other_city');
						$("#other_city").val(arr_result[11].replace(/^\s+|\s+$/g, ''));
						$("#other-city-container").show();
					}
							
					
					$("#isd_code").val(arr_result[8].replace(/^\s+|\s+$/g, ''));
					$("#mobile_phone").val(arr_result[9].replace(/^\s+|\s+$/g, ''));
					
					if(arr_result[11].replace(/^\s+|\s+$/g, '') != '' && arr_result[7].replace(/^\s+|\s+$/g, '') == '0')
					{
						$("#other-city-container").show();
						$("#city").val('other_city');
						$("#other_city").val(arr_result[11].replace(/^\s+|\s+$/g, ''));
					}
					else{
						$("#other-city-container").hide();	
					}
					
					$('#mobile_phone').attr('minlength','10');
					$('#mobile_phone').attr('maxlength','10');	
				
				}else{
					$("#city-container").hide();
					$("#state-container").hide();
					$("#other-state-container").show();
					$("#other_state").val(arr_result[10].replace(/^\s+|\s+$/g, ''));
					
					$('#mobile_phone').attr('minlength','3');
					$('#mobile_phone').attr('maxlength','15');
				}	
				
				$("#isd_code").val(arr_result[8].replace(/^\s+|\s+$/g, ''));
				
				var mobile = arr_result[9].replace(/^\s+|\s+$/g, '');
				var mobile_arr = mobile.split("/");
				$("#mobile_phone").val(mobile_arr[0]);
							
				
				$("#your_name").focus();
				$("#country").focus();
				$("#state_code1").focus();
				$("#mobile_phone").focus();
				$("#other-city-container").focus();
				$("#captcha").focus();
				
			}
			else{
				$("#your_name").val('');
				$("#gender_type").val('Mr');
				$("#comp_name").val('');	
				$("#country").val('');
				$("#state_code1").val('');
				$("#other_state").val('');
				$("#city").val('');
				$("#mobile_phone").val('');
				$("#isd_code").val('');
				$("#other_city").val('');
				$("#state-container").hide();
				$("#city-container").hide();
				$("#other-state-container").hide();
				$("#other-city-container").hide();
				
				$('#mobile_phone').attr('minlength','10');
				$('#mobile_phone').attr('maxlength','10');
				
			}
			
			$('#loader').html('');
			
		}
    });
    
}


function getCityStateWise(url, state, selectedid,ajax_type){
	
	$.ajax({
		url: url+"&state="+state+"&sel="+selectedid+"&ajax_type="+ajax_type,
		method : "POST",
		success:function(result){
      		$("#city").html(result);
   		}
    });
}

function checkAlphaCharacters(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	
	if (charCode == 8 || charCode ==32 || charCode ==46 || charCode == 45 || (charCode>96 && charCode<123) || (charCode>64 && charCode<91)) {
		
		return true;
	}
	else {
		
		return false;
	}
}
// End