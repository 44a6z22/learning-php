<?php
    require("includes/connection.php");
    require("model/Const.php");
    require("model/user.php");
	require("model/book.php");
	require("model/comment.php");
	
	session_start();
	$_INDEX = "../../../";
	
	// needed where the loged in users informations shouldn't change
	if(isset($_SESSION['userLogin']))
	{
		$profileOwner = new User($connection);
		$profileOwner->setId($_SESSION['userLogin']);
		$profileOwner->setUserData();
	}
?>
