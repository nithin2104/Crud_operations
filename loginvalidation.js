$(document).ready(function () { 

	$("#lemailError").hide(); 
	let emailError = true; 
	$("#lemailId").keyup(function () { 
		validateEmail(); 
	}); 

    function validateEmail(){
       
        let evalue = $("#lemailId").val(); 
        let regex= /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;

		if (evalue.length == "") { 
			$("#lemailError").show(); 
			emailError = false; 
			return false; 
		} 
		else if (!(regex.test(evalue))) { 
			$("#lemailError").show(); 
            emailError = false; 
			return false; 
		} else { 
			$("#lemailError").hide(); 
            emailError = true; 

		}
    }  


    $("#lpassError").hide(); 
	let passwordError = true; 
	$("#lpassId").keyup(function () { 
		validatePassword(); 
	}); 

    function validatePassword(){
       
        let pvalue = $("#lpassId").val(); 
        let regex= /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

		if (pvalue.length == "") { 
			$("#lpassError").show(); 
			passwordError = false; 
			return false; 
		} 
		else if (!(regex.test(pvalue))) { 
			$("#lpassError").show(); 
			passwordError = false; 
			return false; 
		} else { 
			$("#lpassError").hide(); 
            passwordError = true; 

		}
    } 

    $("#loginId").click(function (e) {
        validateEmail();
        validatePassword();  
		if (passwordError == true && emailError == true) { 
            return true; 
		} else { 
			return false; 
		} 
	});

});