<?php

	session_start();
	if (isset($_SESSION["mess"])) {
		print_r($_SESSION["mess"]);
	}

?>

<!DOCTYPE html>
<html>
	
<head>
	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/
	4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="file.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/
	jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/
	popper.js/1.12.9/umd/popper.min.js">
	</script>
	<!-- JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/
	4.0.0/js/bootstrap.min.js">
	</script>
	<!-- Ajax -->
  	<script src="ajax.js"></script>
</head>

<body><br>
	<h1 class="text-center text-danger">
		Welcome!
	</h1>
	<p class="text-center">
		VALIDATION FORM
	</p>

	<div id="mydiv" class="container">
		<div class="col-lg-8
		m-auto d-block">
			<form action="" id="ajax_form" method="post">
				<div class="form-group">
					<label for="user">
						Username:
					</label>
					<input type="text" name="usernames" id="usernames" required class="form-control" pattern="^[a-zA-Z]{2}$">
					<h5 id="usercheck" style="color: red;">
						**Enter your name
					</h5>
				</div>

                <div class="form-group">
					<label for="login">
						Login:
					</label>
					<input type="text" name="login" id="login" required class="form-control" pattern="[^\s]{6,}">
					<h5 id="logcheck" style="color: red;">
						**Please enter your login
					</h5>
				</div>
				
				<div class="form-group">
					<label for="user">
						Email:
					</label>
					<input type="text" name="email" id="email" required class="form-control" pattern="^(([0-9A-Za-z]{1}[\-0-9A-z\.]{1,}[0-9A-Za-z]{1})@([\-A-Za-z]{1,}\.){1,2}[\-A-Za-z]{2,})$">
					<h5 id="emcheck" style="color: red;">
						**Email is expected
					</h5>
				</div>

				<div class="form-group">
					<label for="password">
						Password:
					</label>
					<input type="password" name="password" id="password" required class="form-control" pattern="^(?=.*[0-9])(?=.*[A-Za-z])[0-9a-zA-Z]{6,}$">
					<h5 id="passcheck" style="color: red;">
						**Append password
					</h5>
				</div>

				<div class="form-group">
					<label for="conpassword">
						Confirm Password:
					</label>
					<input type="password" name="conpassword" id="conpassword" required class="form-control">
					<h5 id="conpasscheck" style="color: red;">
						**Password didn't match
					</h5>
				</div>

				<input type="submit" id="submitbtn" value="Submit" class="btn btn-info">
			</form> 

			<a href="authorization.php">Are you already registered?</a>
		</div>
	</div>

	<div id="for_errors"></div>
	
	<p>
		<?php

			error_reporting(E_ERROR | E_PARSE); 
			print_r($_SESSION["message"]);
			unset($_SESSION["message"]);

		?>
	</p>

	<script type="text/javascript">$("#mydiv").removeClass("container");</script>

	<noscript><p>Please enable javascript</p></noscript>

<!-- Including jQuery Script Application -->
	<script src="app1.js"></script>
</body>

</html>
