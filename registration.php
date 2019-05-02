<?php
    include "php/config.php";

    if (isset($_GET['token']))
    {
        $user = new User($connection);
        $user->setUniqId($_GET['token']);

        if ($user->updateStatus())
            echo 'ok';
        else
            echo 'not ok';
    }
?>