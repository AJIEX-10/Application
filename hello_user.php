<?php
	session_start();
    error_reporting(E_ERROR | E_PARSE);
    if (isset($_SESSION["mess"])) {
		print_r($_SESSION["mess"]);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index0.php">go to the main page</a>
</body>
</html>