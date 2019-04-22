<?php
    include "php/config.php";
    if(!isset($_SESSION['userLogin'])){
        header('location: register.php');
    }else{
        header('location: profile.php');
    }
?>
