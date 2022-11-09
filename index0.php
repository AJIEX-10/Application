<?php
	session_start();
	if (isset($SESSION["mess"])) {
		print_r($SESSION["mess"]);
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery
	/3.0.0/jquery.min.js">
	</script>
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
			<form action="authorization.php" id="ajax_form" method="post" >
				<div class="form-group">
					<label for="user">
						Username:
					</label>
					<input type="text" name="usernames" id="usernames" required class="form-control" pattern="^\s*([a-zA-Z]{2,3}|\s{2,3}|[a-zA-Z]\s[a-zA-Z])\s*$">
					<h5 id="usercheck" style="color: red;">
						**Enter your name
					</h5>
				</div>

                <div class="form-group">
					<label for="login">
						Login:
					</label>
					<input type="text" name="login" id="login" required class="form-control" pattern="^[.]{6,}$">
					<h5 id="logcheck" style="color: red;">
						**Please enter your login
					</h5>
				</div>
				
				<div class="form-group">
					<label for="user">
						Email:
					</label>
					<input type="email" name="email" id="email" required class="form-control">
					<small id="emailvalid" class="form-text
				text-muted invalid-feedback">
						Your email must be a valid email
					</small>
				</div>

				<div class="form-group">
					<label for="password">
						Password:
					</label>
					<input type="password" name="password" id="password" required class="form-control" pattern="^(?=.*[0-9].*[0-9])(?=.*[A-Za-z].*[A-Za-z]).{6,}$">
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

	<div id="result_form"></div>

	<p>
		<?php
			error_reporting(E_ERROR | E_PARSE); 
			print_r($SESSION["message"]);
			unset($SESSION["message"]);
		?>
	</p>

	<script type="text/javascript">
    $("#mydiv").removeClass("container");
	</script>

	<noscript><p>Please enable javascript</p></noscript>

<!-- Including jQuery Script Application -->
	<script src="app1.js"></script>
</body>

</html>
