<?php
    require("../../config.php");


    // Check if the form was submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        upload("profilePictures", $connection);
    }else{
        echo "..;";
    }

    function upload($folder, $connection){
         // Check if file was uploaded without errors
         
        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "pdf" => "file/pdf");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
        
            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

            // Verify MYME type of the file
            if(in_array($filetype, $allowed)){
                    // verify if a folder is already exist or not
                    if($folder != $_SESSION['userLogin']){
                        $folder = $_SESSION['userLogin']."/".$folder;
                        if (!file_exists("../upload/".$folder)) mkdir("../upload/".$folder, 0777, true);
                    }

                    move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/".$folder."/" . $filename);
                    if($connection != NULL){
                        echo "break ";
                      $user3 = new User($connection);
                      $user3->setId($_SESSION['userLogin']);
                      $user3->setProfilePicture($filename);
                      
                      try{
                        $user3->addProfilePicture();
                      }catch(Exeption $e){
                        echo $e->getMessage();
                      }
                    }else{

                    }
                    header('location: ' . $_INDEX);

                    return 1;
            } else{
                return 0;
            }
        } else{
            header("location: " . $_INDEX . "?Error=" . $_FILES["photo"]["error"]);
        }
    }
?>
