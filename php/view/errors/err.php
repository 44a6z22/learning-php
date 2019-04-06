<?php
function error($err){
    $res = ""; 
    switch($err){
        case 0 :
            $res = Errors::$USER_NOT_FOUND; 
            break ; 
        case 1 :
            $res = Errors::$MAX_SIZE; 
            break ; 
        case 2 :
            $res = Errors::$WRITE_FAILURE; 
            break ; 
        case 3 : 
            $res = Errors::$PARTIALY_UPLOADED;
            break ;  
        case 4 : 
            $res = Errors::$NO_FILE; 
            break ;
    }
    return $res; 
} 
?>

<div class="col-md-12 danger">
    <div class="alert alert-danger" role="alert">
        <?php echo error($err)?>
    </div>
</div>
<script>
    
    let danger =  document.querySelector('.danger'); 

    setTimeout(() => {
        danger.style.transition = "1s";
        danger.style.opacity = 0 ; 
    }, 500);
    setTimeout(() => {
       danger.style.display = "none";
    }, 1000);
</script>