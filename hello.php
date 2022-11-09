<?php
	session_start();
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
    <noscript><p>Please enable javascript</p></noscript>
    
    <p>
        <?php
            error_reporting(E_ERROR | E_PARSE);
            if (!isset($SESSION["mess"])) {
                header("Location: authorization.php");
            }
            print_r($SESSION["mess"]);
            setcookie("user", $SESSION["mess"], time() + 900);
        ?>
    </p>

    <a href="index0.php">Exit</a>
</body>
</html>