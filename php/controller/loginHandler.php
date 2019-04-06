<?php
    require("../config.php");
    
    session_start();
    
    if(isset($_POST['login'])){

        $user = new User($_POST['username'], $_POST['password']);
        
        if($user->login($connection)){
        
            $_SESSION["userLogin"] = $user->getUserId($connection);
        
            //  Creating a folder for the user on his first login to the website 
            if (!file_exists("../upload/".$_SESSION['userLogin'])) { // cheking if a folder is already exist or not 
                    mkdir("../upload/".$_SESSION['userLogin'], 0777, true);
            }
        
            header('location: ../../');
            
        }else{
            echo "something went wrong !!";
        }
        
    }else{
        echo "login isn't set";
    }
?>