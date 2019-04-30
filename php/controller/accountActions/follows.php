<?php
    require("../../config.php");
    if(isset($_GET['follow']))
    {
        $thisUser = new user($connection);
        $thisUser->setId($_GET['follow']);

        $profileOwner->follows($thisUser);
        header('location: ../../../');
    }
?>