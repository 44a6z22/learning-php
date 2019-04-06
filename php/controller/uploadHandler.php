<?php
    require("../config.php");
    session_start();
    // Check if the form was submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['profilePicture'])){
            
            upload("", "profilePictures");
        }else if(isset($_POST['upload'])){
            upload("", $_SESSION['userLogin']);
        }
    }

    function upload($string, $folder){
         // Check if file was uploaded without errors
        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "pdf" => "file/pdf");
            $filename = $string.$_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            // $filesize = $_FILES["photo"]["size"];
        
            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        
            // // Verify file size - 5MB maximum
            // $maxsize = 5 * 1024 * 1024;
            // if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        
            // Verify MYME type of the file
            if(in_array($filetype, $allowed)){                   
                    // verify if a folder is already exist or not 
                    if($folder != $_SESSION['userLogin']){
                        $folder = $_SESSION['userLogin']."/".$folder;
                        if (!file_exists("../upload/".$folder)) mkdir("../upload/".$folder, 0777, true);
                        
                        $path = "../upload/".$_SESSION["userLogin"] . "/profilePictures/*";
                        $files = glob($path); // get all file names
                        foreach($files as $file){ // iterate files
                        if(is_file($file))
                            unlink($file); // delete file
                        }
                    }else{
                        if (!file_exists("../upload/".$folder)) mkdir("../upload/".$folder, 0777, true);
                    }
                    
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/".$folder."/" . $filename);
                    echo "Your file was uploaded successfully.";
                    header('location: ../../');
               
            } else{
                echo "Error: There was a problem uploading your file. Please try again."; 
            }
        } else{
            header("location: ../../?Error=" . $_FILES["photo"]["error"]);
        }
    }
?>