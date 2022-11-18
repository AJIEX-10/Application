$(document).ready(function () {
    // Validate Username
    $("#usercheck").hide();
    $("#usernames").keyup(function () {
        validateUsername();
    });
    function validateUsername() {
        let usernameValue = $("#usernames").val();
        let format = /^[a-zA-Z]{2}$/;
        if (format.test(usernameValue)==false) {
            $("#usercheck").show();
            $("#usercheck").html("**length of username must 2, only letters");
        } else {
            $("#usercheck").hide();
        }
    }

    // Validate Login
    $("#logcheck").hide();
    $("#login").keyup(function () {
        validateLogin();
    });
    function validateLogin() {
        let loginValue = $("#login").val();
        let format1 = /[^\s]{6,}/;
        if (format1.test(loginValue)==false) {
            $("#logcheck").show();
            $("#logcheck").html(
                "**length of your login must be minimum 6"
        );
            $("#logcheck").css("color", "red");
        } else {
            $("#logcheck").hide();
        }
    }
    
    // Validate Email
    $("#emcheck").hide();
    $("#email").keyup(function () {
        validateEmail();
    });
    function validateEmail() {
        let emailValue = $("#email").val();
        let regex = /^(([0-9A-Za-z]{1}[\-0-9A-z\.]{1,}[0-9A-Za-z]{1})@([\-A-Za-z]{1,}\.){1,2}[\-A-Za-z]{2,})$/;
        if (regex.test(emailValue)==false) {
            $("#emcheck").show();
            $("#emcheck").html(
                "**not valid email or a space was added"
        );
            $("#emcheck").css("color", "red");
        } else {
            $("#emcheck").hide();
        }
    }
    
    // Validate Password
    $("#passcheck").hide();
    $("#password").keyup(function () {
        validatePassword();
    });
    function validatePassword() {
        let passwordValue = $("#password").val();
        let regex2 = /^(?=.*[0-9])(?=.*[A-Za-z])[0-9a-zA-Z]{6,}$/
        if (regex2.test(passwordValue)==false) {
            $("#passcheck").show();
            $("#passcheck").html(
                "**minimum 6, there must be numbers and letters"
            );
            $("#passcheck").css("color", "red");
        } else {
            $("#passcheck").hide();
        }
    }
    
    // Validate Confirm Password
    $("#conpasscheck").hide();
    $("#conpassword").keyup(function () {
        validateConfirmPassword();
    });
    function validateConfirmPassword() {
        let confirmPasswordValue = $("#conpassword").val();
        let passwordValue = $("#password").val();
        if (passwordValue != confirmPasswordValue) {
            $("#conpasscheck").show();
            $("#conpasscheck").html("**Password didn't Match");
            $("#conpasscheck").css("color", "red");
        } else {
            $("#conpasscheck").hide();
        }
    }
});

    