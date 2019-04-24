<?php
  require("../config.php");
  // Check if file was uploaded without errors
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_FILES["bookPhoto"]) && $_FILES["bookPhoto"]["error"] == 0)
	{
		$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "pdf" => "file/pdf");
		$filename = $_FILES["bookPhoto"]["name"];
		$filetype = $_FILES["bookPhoto"]["type"];
		$folder = "/booksPictures";
		
		// Verify file extension
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(!array_key_exists($ext, $allowed)) 
			die("Error: Please select a valid file format.");
		
		// Verify MYME type of the file
		if(in_array($filetype, $allowed))
		{
			// verify if a folder is already exist or not
			if($folder != $_SESSION['userLogin'])
			{
				$folder = $_SESSION['userLogin']."/".$folder;
				if (!file_exists("../upload/".$folder))
					mkdir("../upload/".$folder, 0777, true);
			}
			
			move_uploaded_file($_FILES["bookPhoto"]["tmp_name"], "../upload/".$_SESSION['userLogin']."/booksPictures/" . $filename);

			if(isset($_POST['addBook']))
			{
				$book = new Book();
				$book->setConnection($connection);
				$book->setTitle($_POST['bookTitle']);
				$book->setAuthor($_SESSION['userLogin']);
				$book->setPages($_POST['pages']);
				$book->setPicture($filename);
				$book->add();
				header('location: ../../addbook.php');
			}
			else
			{
				echo "press submit ";
			}
		}
	} 
	else
	{
		echo $_FILES["bookPhoto"]["error"];
	}
}
?>
