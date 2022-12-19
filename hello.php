<?php

    session_start();
    
    $pass=$_POST["apassword"];
    $_POST["apassword"]=sha1($pass)."AbEn3XX900m";
    $filename = "file.json";
    
    $content=file_get_contents('./secret_data/'.$filename);
    $returnee=json_decode($content, true);
    
    foreach($returnee as $ret) {
        if(trim($ret["login"]) == trim($_POST["alogin"]) && trim($ret["password"]) == trim($_POST["apassword"])) {
            $_SESSION["mess"] = "Hello ".$ret["usernames"]."<br>";
            header("Location: hello_user.php");  
        } else {
            unset($_SESSION["mess"]);
            setcookie("error", "incorrectly name or password", time() + 5);
            header("Location: authorization.php");
        }
    }