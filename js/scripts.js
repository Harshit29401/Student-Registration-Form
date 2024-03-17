jQuery(document).ready(function ($) {
    
    // $.validator.setDefaults({
    //     debug: true,
    //     success: "valid"
    //   });
    
    $.validator.addMethod("customPassword", function (value, element) {
        return /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[0-9]).*$/.test(value);
    }, "Password must contain at least one uppercase letter, one special character, and one number");


    $.validator.addMethod("forSelect", function (value, element, param) {
        return value != 'dept';
    },'Please Select Your Department');

    
    $("#student").validate({
        rules: {
            fname: {
                required:true,
                minlength:3
            },
            lname: {
                required:true,
                minlength:3
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8,
                customPassword: true
            },
            'gender[]' : {
                required : true
            },
            department : {
                forSelect : true
            },
            address_line_1: {
                required : true
            },
            city:{
                required: true
            },
            State:{
                required: true
            },
            Country:{
                required: true
            },
            zip_code:{
                required: true,
                digits: true,
                minlength : 6, 
                maxlength : 6
            }, 
            Contact_no: {
                required: true,
                digits: true,
                minlength : 10, 
                maxlength : 10
            },
            profilePic:{
                required: true,
                accept: "image/*"
            },
            resume:{
                required: true,
                accept: "application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf"
            }
        },
        messages: {
            fname: {
                required:"Please Enter Your First Name",
                minlength:"First Name should be at least 3 letrer long"
            },
            lname: {
                required:"Please Enter Your Last Name",
                minlength:"Last Name should be at least 3 letrer long"
            },
            email: {
                required: "Please Enter Your Email",
                email: "Please Enter a Valid Email Address"
            },
            password: {
                required: "Please Enter a Password",
                minlength: "Password must be at least 8 characters long"
            },
            department : {
                required: " Please select derpartment"
            },
            address_line_1: {
                required: "Please Enter Your Address"
            },
            city:{
                required: "Please Enter Your City"
            },
            State:{
                required: "Please Enter Your State"
            },
            Country:{
                required: "Please Enter Your Country"
            },
            zip_code:{
                required: "Please Enter Your Postal Code",
                digits : "Please Enter Numbers Only",
                minlength: "Zip Code Should be 6 digits long",
                maxlength :"Zip Code Should be 6 digits long"  
            },
            Contact_no:{
                required: "Please Enter Your Contact Number",
                digits : "Please Enter Numbers Only",
                minlength: "Contact Number Should be 10 digits long",
                maxlength :"Contact Number Should be 10 digits long"  
            },
            profilePic : {
                required: "Please Upload Your Proflie Photo",
                accept: "Please Upload only Image (.png, .jpg, .jpeg, .gif)"
            },
            resume:{
                required: "Please Upload Your Resume",
                accept: "Please Upload only Document (.doc, .docx, .pdf)"
            }
        }
    });
});