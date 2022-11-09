$( document ).ready(function() {
    $("#submitbtn").click(
		function willsend(){
			sendAjaxForm("result_form", "mydiv", "signup.php");
			return false; 
		}
	);
});
 
function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:    "signup.php",
        type:     "POST",
        dataType: "html",
        data: $("#"+ajax_form).serialize(),
        success: function(response) {
        	result = $.parseJSON(response);
        	$('#result_form').html("Name: "+result.usernames+"<br>Email: "+result.email+"<br>Login: "+result.login+"<br>Password: "+result.password);
    	},
    	error: function(response) {
            $('#result_form').html("Error, no data sent");
    	}
 	});
}