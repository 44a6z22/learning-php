<?php
    require("../../config.php");

    if(isset($_POST['register']))
    {
        $user = new User($connection, 
                htmlspecialchars($_POST["username"]), 
                htmlspecialchars($_POST["fisrtname"]), 
                htmlspecialchars($_POST["lastname"]), 
                htmlspecialchars($_POST["email"]), 
                htmlspecialchars($_POST["password"]), 
                htmlspecialchars($_POST['birthdate']), 
                htmlspecialchars(intval($_POST['accountType'])) );
        $user->register();
    }
?>
