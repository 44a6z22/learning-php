<?php
    require "includes/connection.php";
    require "model/Const.php";
    require "model/user.php";
    require "model/book.php";
    session_start();
    // needed where the loged in users informations don't change
  if(isset($_SESSION['userLogin'])){
    $profileOwner = new User($connection);
    $profileOwner->setId($_SESSION['userLogin']);
    $profileOwner->setUserData();
  }
?>
