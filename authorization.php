<?php

	session_start();
	if (isset($_COOKIE["error"])) {
		print_r($_COOKIE["error"]);
	} if (isset($_SESSION["mess"])) {
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
	<script src="https://ajax.googleapis.com/ajax/libs/
	jquery/3.3.1/jquery.min.js">
	</script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/
	popper.js/1.12.9/umd/popper.min.js">
	</script>
	<!-- JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/
	4.0.0/js/bootstrap.min.js">
	</script>
</head>

<body><br>
	<h2 class="text-center text-warning">
		You have record!
	</h2>
	<p class="text-center">
		AUTHORIZATION
	</p>

	<div id="authdiv" class="container">
		<div class="col-lg-8
		m-auto d-block">
			<form action="hello.php" method="post">

                <div class="form-group">
					<label for="alogin">
						Login:
					</label>
					<input type="text" name="alogin" id="alogin" required class="form-control">

				<div class="form-group">
					<label for="apassword">
						Password:
					</label>
					<input type="password" name="apassword" id="apassword" required class="form-control">
				</div>

				<input type="submit" id="submitbtn" value="Submit" class="btn btn-info">
			</form>
		</div>
	</div>

	<script type="text/javascript">$("#authdiv").removeClass("container");</script>

	<noscript><p>Please enable javascript</p></noscript>

</body>

</html>
