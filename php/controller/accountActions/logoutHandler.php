<?php
    // Starting session
    session_start();

    if(isset($_SESSION['userLogin']))
    {
        unset($_SESSION['userLogin']);
        header('location: ../../../' );
    }
    
    // Destroying session
    session_destroy();
?>