<?php
    require("../../config.php");

    if(isset($_POST['register']))
    {   
        $token = uniqid('', PASSWORD_BCRYPT);
        $user = new User($connection, 
                htmlspecialchars($_POST["username"]), 
                htmlspecialchars($_POST["fisrtname"]), 
                htmlspecialchars($_POST["lastname"]), 
                htmlspecialchars($_POST["email"]), 
                htmlspecialchars($_POST["password"]), 
                htmlspecialchars($_POST['birthdate']), 
                intval(htmlspecialchars($_POST['accountType'])), 
                $token );
                
        if ($user->register())
        {
            $mail = new Mail(htmlspecialchars($_POST["email"]), EMAIL::$MAIL_REGISTER_SUBJECT, EMAIL::$MAIL_MESSAGE . "\n 127.0.0.1/php/registration.php?token=".$token, "header");
            $mail->send();
            header("location: ../../../");
        }
        else{
            header('location: ../../register.php?action=register&Error=10');
        }
    }
?>
