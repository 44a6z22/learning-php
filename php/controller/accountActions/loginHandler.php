<?php
    require("../../config.php");

    if(isset($_POST['login']))
    {
        if($_POST['username'] != "" && $_POST['password'] != "")
        {
            $user = new User($connection, $_POST['username'], $_POST['password']);
            if($user->login())
            {
                $_SESSION["userLogin"] = $user->getUserIdFromDB($connection);
                $user->setId($_SESSION['userLogin']);
                $user->setUserData();
                $_SESSION['userFullName'] = $user->getFullName();
             
                //  Creating a folder for the user on his first login to the website
                if (!file_exists("../../upload/".$_SESSION['userLogin']))  // cheking if a folder is already exist or not
                {
                    mkdir("../../upload/".$_SESSION['userLogin'], 0777, true);
                }

                header('location: ' . $_INDEX);
            }
            else
            {
                header('location: ' . $_INDEX . 'register.php?Error=0');
            }
        }
        else
        {
            header('location: ' . $_INDEX . 'register.php?Error=10');
        }

    }
    else
    {
        echo "you ain't gonna get much from coming here !!";
    }
?>
