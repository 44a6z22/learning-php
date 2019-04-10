<?php
    $user->setUserId($id);
    $results = $user->getPinnedComments();
     echo count($results);
?>
<!--References Sec-->
    <section id="references_sec" class="reference-sec sec-pad-top-sm">
        <h2 class="mb-30">testimonial</h2>
        <div class="row">
            <div class="col-sm-12 mb-30">
                <div class="mdl-card mdl-shadow--2dp border-top-yellow pa-35">
                    <div class="testimonial-carousel">
                        <?php
                        $i = 0 ; 
                        while(sizeOf($results) > $i){
                        ?>
                        <div>
                            <blockquote>"<?php echo $i+1 . ' => ' . $results[$i]['commentContent'];?></blockquote>
                            <span class="ref-name block mb-5 mt-20"><?php  echo $results[$i]['firstName'];?></span>
                            <span class="ref-desgn block">Lead Designer in Droffox</span>
                        </div>
                        
                        <?php
                        $i++;
                        }
                        ?>
                        </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    
    </section>
<!--/References Sec--> 