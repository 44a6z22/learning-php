<?php

    require("../config.php");
    if(isset($_POST['register'])){

        $user = new User($connection, $_POST["username"], $_POST["fisrtname"], $_POST["lastname"], $_POST["email"], $_POST["password"], $_POST['birthdate']);
    
        $account->register();
        
    }
?>