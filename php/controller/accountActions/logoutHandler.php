<?php
    // Starting session
    session_start();

    if(isset($_SESSION['userLogin']))
    {
        unset($_SESSION['userLogin']);
        header('location:' . $_INDEX);
    }
    
    // Destroying session
    session_destroy();
?>