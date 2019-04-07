<?php
    require "includes/connection.php";
    require "model/Const.php";
    require "model/Account.php";
    require "model/user.php";
    
    $account = new Account($connection);
?>