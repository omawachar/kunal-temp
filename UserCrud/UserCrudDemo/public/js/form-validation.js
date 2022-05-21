//wait for DOM
$(document).ready(function () {
    //initialize form validation
    //of name attribite "registration"
    $("#register,#update").validate({
//now enter the validation rules
        rules: {
            name: "required",
            digits:false,
        email: {
            required: true,
            // email: true,
            // uniqueUserName:true
            },
            date_of_birth: {
            required:true
            },
            role: {
               required:true 
            },
        password: {
            required: true,
            minlength: 4
        },
        confirm_password: {
            required: true,
            minlength: 4,
            equalTo:"#password"
        }
        
        },
        messages: {
            name: "please enter your  name",
            digits:" digits not allowed  ",
            email: {
                required: "This field is required1",  
                uniqueUserName:"email id already exixts"
            },
            date_of_birth: {
                      required:"please enter your date of birth" 
            },
            role: {
                required:" Please assign a role"
            },
            password: {
                required: "please provide a password",
                minlength:"your password must be at least 4 characters long"
            },
            confirm_password: {
                required: "please provide a password",
                minlength: "your password must be at least 4 characters long",
                equalTo:"Please enter the same password as above"
            },
        }
    
    });

});