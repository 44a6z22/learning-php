<?php
$path = 'php/upload/'.$id.'/profilePictures/';
    if(file_exists($path)){
      if ($handle = opendir($path)){
        while (false !== ($entry = readdir($handle))) { 
          if ($entry != "." && $entry != ".." && $entry != "profilePictures"){
            
            ?>        
            
              <img src="<?php echo $path.$entry ;?>" alt="..." class="img-thumbnail profile-pic">
            
            <?php
          }
        }
      }
    }
?>