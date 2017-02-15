function validateEmail()
{
	var emailid=document.feedback.email.value;
	atpos = emailid.indexOf("@");
 	dotpos = emailid.lastIndexOf(".");
 	if (atpos < 1|| dotpos<atpos+2)
 	{
	 	alert("Please enter a valid mail id");
                  	 document.feedback.email.focus();
 	 	return false;
 	}
	return true;

}
function validate(){
	var email = document.feedback.email.value;
	var name = document.feedback.Name.value;
	var comm = document.feedback.comment.value;
	
	if(name==""){
		alert("Please provide your name!!!");
		document.feedback.Name.focus();
		return false;
	}
	if(email==""){
		alert("Please provide your mail address!!!");
		document.feedback.email.focus();
		return false;
	}
	else{
		var res = validateEmail();
		if(res==false){
			return false;
		}
	}
	if(comm==""){
		alert("Please provide a comment about this site!!!");
		document.feedback.comment.focus();
		return false;
	}
	alert("Your feedback has been received!!! Thanks for visiting this site!!!");
	return true;
};