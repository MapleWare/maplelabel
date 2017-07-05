
$(document).ready(function(){
	
	var addUserForm = $("#addnotice");
	
	var validator = addUserForm.validate({
		
		rules:{
			subject :{ required : true },
			// email : { required : true, email : true, remote : { url : baseURL + "checkEmailExists", type :"post"} },
			content : { required : true },
			content_type : { required : true, selected : true },
			show_yn : { required : true, selected : true }
			// cpassword : {required : true, equalTo: "#password"},
			// mobile : { required : true, digits : true },
			// role : { required : true, selected : true}
		},
		messages:{
			subject :{ required : "This field is required" },
			content :{ required : "This field is required" },
			content_type :{ required : "This field is required", selected : "Please select atleast one option" },
			show_yn :{ required : "This field is required", selected : "Please select atleast one option" }
			// email : { required : "This field is required", email : "Please enter valid email address", remote : "Email already taken" },
			// password : { required : "This field is required" },
			// cpassword : {required : "This field is required", equalTo: "Please enter same password" },
			// mobile : { required : "This field is required", digits : "Please enter numbers only" },
			// role : { required : "This field is required", selected : "Please select atleast one option" }			
		}
	});
});
