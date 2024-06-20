$(document).ready(function () { 

    // nameError
    $("#nameError").hide(); 
	let nameError = true; 
	$("#nameId").keyup(function () { 
		validateName(); 
	}); 

    function validateName(){
       
        let nvalue = $("#nameId").val(); 
		if (nvalue.length == "") { 
			$("#nameError").show(); 
			nameError = false; 
			return false; 
		} 
		else if (nvalue.length < 2) { 
			$("#nameError").show(); 
			nameError = false; 
			return false; 
		} else { 
			$("#nameError").hide(); 
			nameError=true;
		}
    }

    // emailError
	$("#emailError").hide(); 
	let emailError = true; 
	$("#emailId").keyup(function () { 
		validateEmail(); 
	}); 

    function validateEmail(){
       
        let evalue = $("#emailId").val(); 
        let regex= /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;

		if (evalue.length == "") { 
			$("#emailError").show(); 
			emailError = false; 
			return false; 
		} 
		else if (!(regex.test(evalue))) { 
			$("#emailError").show(); 
			emailError = false; 
			return false; 
		} else { 
			$("#emailError").hide(); 
			emailError=true;
		}
    }  

    // passError
    $("#passError").hide(); 
	let passwordError = true; 
	$("#passId").keyup(function () { 
		validatePassword(); 
	}); 

    function validatePassword(){
       
        let pvalue = $("#passId").val(); 
        let regex= /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

		if (pvalue.length == "") { 
			$("#passError").show(); 
			passwordError = false; 
			return false; 
		} 
		else if (!(regex.test(pvalue))) { 
			$("#passError").show(); 
			passwordError = false; 
			return false; 
		} else { 
			$("#passError").hide(); 
			passwordError=true;
		}
    } 

    // ageError
    $("#ageError").hide(); 
	let ageError = true; 
	$("#ageId").keyup(function () { 
		validateAge(); 
	}); 

    function validateAge(){
       
        let avalue = $("#ageId").val(); 
		if (avalue.length == "") { 
			$("#ageError").show(); 
			ageError = false; 
			return false;  
		} else { 
			$("#ageError").hide(); 
			ageError=true;
		}
    }
	
	// genderError
	let isValid=true;
	$("#gender").keyup(function(){
		validategender();		
	})
	function validategender(){
		 isValid = $("input[name=gender]").is(":checked");
		$("#genderError")[0].style.display = isValid ? "none" : "block";
	}


    // DeptError
    $("#deptError").hide(); 
	let deptError = true; 
	$("#deptId").keyup(function () { 
		validateDept(); 
	}); 

    function validateDept(){
       
        let dvalue = $("#deptId").val(); 
		if (dvalue.length == "") { 
			$("#deptError").show(); 
			deptError = false; 
			return false;  
		} else { 
			$("#deptError").hide(); 
			deptError=true;
		}
    }

    // salaryError
    $("#salaryError").hide(); 
	let salaryError = true; 
	$("#salaryId").keyup(function () { 
		validateSalary(); 
	}); 

    function validateSalary(){
       
        let svalue = $("#deptId").val(); 
		if (svalue.length == "") { 
			$("#salaryError").show(); 
			salaryError = false; 
			return false; 
		} else { 
			$("#salaryError").hide(); 
			salaryError=true;
		}
    }

    $("#addId").click(function (e) {  
		validateName();
		validateEmail();
		validateAge();
		validateDept();
		validateSalary();
		validategender();
		if (nameError == true && passwordError == true && 
            emailError == true && ageError == true &&
            deptError == true && salaryError == true && isValid) { 
			return true;
		} else { 
			return false; 
		} 
	});
	


});