$(document).ready(function () {
    $('#registration').validate({
        rules: {
            username: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 30
            },
            secondaryPassword: {
                minlength: 6,
                maxlength: 30,
                equalTo: "#password"
            }
        },
        messages: {
            username: {
                required: "Please enter a valid user name."
            },
            email: {
                email: "Please provide a valid email.",
                required: "You must to enter your email address."
            },
            password: {
                required: "You must to enter your new password.",
                minlength: "Password must be more than 6 symbols.",
                maxlength: "Password must not be more than 30 symbols."
            },
            secondaryPassword: {
                equalTo: "Passwords doesn't match."
            }
        },
        errorLabeLContainer: '#errors',
        errorPlacement: function (error, element) {
            error.appendTo($('#registrationErrors'));
        }
    });
    $('#login').validate({
        rules: {
            usernameOrEmail: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            username: {
                required: "Please enter your user or email address to proceed."
            },
            password: {
                required: "Please enter your password."
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo($('#loginErrors'));
        }
    });
});