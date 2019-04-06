<?php
    if ($handle = opendir('php/upload/'.$_SESSION['userLogin'])) {
   
    while (false !== ($entry = readdir($handle))) {
        
      if ($entry != "." && $entry != ".." && $entry != "profilePictures") {

        $filename = $_SESSION['userLogin'] . "/" . $entry;
?>
      <div class="col-md-3">
        <figure class="figure">

          <img src="<?php echo "php/upload/".$filename?>" class="figure-img img-fluid rounded" >
        
          <figcaption class="figure-caption text-right"><?php echo $entry; ?></figcaption>
        
          <a href="php/controller/deletePicture.php?name=<?php echo $filename ?>" class="btn btn-danger btn-block lg-btn">Delete</a>
        
        </figure>
      </div>
<?php
          
            
      }
    }
    
    closedir($handle);
}
?>
