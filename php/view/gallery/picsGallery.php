<?php
  if(file_exists($path)){
    if ($handle = opendir('php/upload/'.$id)) {
      $counter = 0 ; 
      while (false !== ($entry = readdir($handle))) {   
        if ($entry != "." && $entry != ".." && $entry != "profilePictures") {
          if($counter <= 2){
            $filename = $id . "/" . $entry;
?>
              <div class="col-sm-4 mb-30">
                <div class="mdl-card mdl-shadow--2dp pa-0">
                  <div class="mdl-card__title pa-0">
                    <div class="blog-img blog-1">
                      <img src="<?php echo "php/upload/".$filename?>" class="figure-img img-fluid rounded" >
                    </div>
                  </div>
                  <div class="mdl-card__supporting-text relative">
                    <span class="blog-cat">horror</span>
                    <a href="youtube-blog-post.html">
                      <h4 class="mt-15 mb-20"><?php echo $entry; ?></h4>
                    </a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit eleifend lacinia...</p>
                  </div>
                  <div class="mdl-card__actions mdl-card--border">
                    <span class="blog-post-date inline-block">21.1.17</span>
                    <div class="mdl-layout-spacer"></div>
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mr-5" href="php/controller/deletePicture.php?name=<?php echo $filename ?>">
                      <i class="zmdi zmdi-favorite"></i>
                    </button>	
                    <button id ="share_menu_1" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                      <i class="zmdi zmdi-share" alt="share"></i>
                    </button>
                    
                  </div>
                </div>
              </div>
<?php            
          }
          $counter++;
        } 
      }
      closedir($handle);
    }
  }else{
    echo "User has not added any books yet ";
  }
?>
