<?php   
    require("../config.php");
    session_start();    
   
    if(isset($_POST['login'])){

        if($_POST['username'] != "" && $_POST['password'] != ""){
           
            $user = new User($_POST['username'], $_POST['password']);
           
            if($account->login($user)){
            
                $_SESSION["userLogin"] = $user->getUserIdFromDB($connection);
                //  Creating a folder for the user on his first login to the website 
                if (!file_exists("../upload/".$_SESSION['userLogin'])) { // cheking if a folder is already exist or not 
                        mkdir("../upload/".$_SESSION['userLogin'], 0777, true);
                }
                
                header('location: ../../');
                
            }else{
                header('location: ../../register.php?Error=0');
            }
        }else{
            header('location:../../register.php?Error=10');
        }
        
    }else{
        echo "you ain't gonna get much from coming here !!";
    }
?>