<?php
	session_start();
	if (isset($_COOKIE["error"])) {
		header("Location: hello.php");
	}
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
	<script src="https://ajax.googleapis.com/ajax/libs/
	jquery/3.3.1/jquery.min.js">
	</script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/
	popper.js/1.12.9/umd/popper.min.js">
	</script>
	<!-- Latest compiled JavaScript -->
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
					<label for="login">
						Login:
					</label>
					<input type="text" name="login" id="login" class="form-control">
					<h5 id="logcheck" style="color: red;">
						**Please enter your login
					</h5>

				<div class="form-group">
					<label for="password">
						Password:
					</label>
					<input type="password" name="password" id="password" class="form-control">
					<h5 id="passcheck" style="color: red;">
						**Please fill the password
					</h5>
				</div>

				<input type="submit" id="submitbtn" value="Submit" class="btn btn-info">
			</form>
		</div>
	</div>

	<script type="text/javascript">
    $("#authdiv").removeClass("container");
	</script>

	<noscript><p>Please enable javascript</p></noscript>

	<script src="app.js"></script>

	<?php
		error_reporting(E_ERROR | E_PARSE);
		$pass=$_POST["password"];
		$_POST["password"]=sha1($pass)."AbEn3XX900m";
		$filename = "file.json";

		print_r($_SESSION["okey"]);
		unset($SESSION["okey"]);

		$content=file_get_contents('./secret_data/'.$filename);
		$returnee=json_decode($content, true);
		foreach($returnee as $ret)
		{
			if(trim($ret["login"]) == trim($_POST["login"]) && trim($ret["password"]) == trim($_POST["password"]))
			{
				$_SESSION["mess"] = "Hello".$_POST["usernames"];
		
			} else {
			setcookie("error", "incorrectly name or password", time() + 5);
			}
		}
    ?>
</body>

</html>
