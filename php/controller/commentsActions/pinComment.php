
<?php
    require("../../config.php");

    if(isset($_GET['commentId']) && isset($_GET['commentTo']) )
    { 
        $comment = new Comment($connection);

        $comment->setId($_GET['commentId']);
        $comment->setReciver($_GET['commentTo']);

        if(!$comment->pin())
        {
            echo Error::$PIN_FAIL;
        }
        else
        {
            header("location:" . $_INDEX);
        }
    }
?>