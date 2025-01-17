$(document).ready(function () {
    // Apply validation on the form
    $("form").validate({
        // Define validation rules
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            contact: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15
            },
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                equalTo: "#password"  // Make sure confirm password matches the password field
            },
            role_id: {
                required: true
            },
            count_id: {
                required: true
            },
            state_id: {
                required: true
            },
            city_id: {
                required: true
            }
        },
        // Define custom error messages
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must be at least 3 characters long"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            contact: {
                required: "Please enter your contact number",
                digits: "Please enter a valid contact number",
                minlength: "Your contact number must be at least 10 digits",
                maxlength: "Your contact number must not exceed 15 digits"
            },
            password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 6 characters long"
            },
            confirm_password: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            },
            role_id: {
                required: "Please select your role"
            },
            count_id: {
                required: "Please select your country"
            },
            state_id: {
                required: "Please select your state"
            },
            city_id: {
                required: "Please select your city"
            }
        },
        // Specify where to show error messages
        errorElement: "div",
        errorClass: "invalid-feedback",
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        },
        submitHandler: function (form) {
            form.submit();  // Submit the form if validation is successful
        }
    });
});
