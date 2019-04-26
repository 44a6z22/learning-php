<?php
    require("../../config.php");
    if(isset($_POST['submitComment']))
    {
        $comment = new Comment($connection, intval($_SESSION['userLogin']), intval($_POST['reciverId']), $_POST['commentContent'], 0); 
       
        if($comment->add())
        {
            header('location: ' . $_INDEX . 'profile.php?userId=' . $_POST['reciverId']);
        } 
    }
?>