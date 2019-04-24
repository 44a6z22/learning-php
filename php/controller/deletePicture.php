<?php
    if(isset($_GET['name']))
    {
        $name = "../upload/".$_GET['name'];
        unlink($name) or die('couldn\'t delete the file');
    }
    header("location: ../../");
?>