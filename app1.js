$(document).ready(function () {
    // Validate Username
    $("#usercheck").hide();
    $("#usernames").keyup(function () {
        validateUsername();
    });
    function validateUsername() {
        let usernameValue = $("#usernames").val();
        let format = /^\s*([a-zA-Z]{2,3}|\s{2,3}|[a-zA-Z]\s[a-zA-Z])\s*$/;
        if (usernameValue.length == "") {
        $("#usercheck").show();
        } else if (usernameValue.length < 2 || format.test(usernameValue)==false) {
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
        let format1 = /^[.]{6,}$/;
        if (loginValue.length == "" || format1.test(loginValue)==false) {
        $("#logcheck").show();
        }
        if (loginValue.length < 6) {
        $("#logcheck").show();
        $("#logcheck").html(
            "**length of your login must be more than 6"
        );
        $("#logcheck").css("color", "red");
        } else {
        $("#logcheck").hide();
        }
    }
    
    // Validate Email
    const email = document.getElementById("email");
    email.addEventListener("blur", () => {
        let regex = /^\s*([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)([a-zA-Z])\s*$/;
        let s = email.value;
        if (regex.test(s)) {
        email.classList.remove("is-invalid");
        emailError = true;
        } else {
        email.classList.add("is-invalid");
        emailError = false;
        }
    });
    
    // Validate Password
    $("#passcheck").hide();
    $("#password").keyup(function () {
        validatePassword();
    });
    function validatePassword() {
        let passwordValue = $("#password").val();
        let regex2 = /^(?=.*[A-Za-z].*[A-Za-z])(?=.*[0-9].*[0-9]).{6,}$/
        if (passwordValue.length == "") {
        $("#passcheck").show();
        }
        if (passwordValue.length < 6 || regex2.test(passwordValue)==false) {
        $("#passcheck").show();
        $("#passcheck").html(
            "**length of your password must be more than 6, there must be numbers and letters"
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

    