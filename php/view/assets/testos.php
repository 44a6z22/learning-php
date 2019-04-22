<?php
$user1 = new User($connection);
    $user1->setId($id);
    $user1->setUserData();
    $results = $user1->getPinnedComments();
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
                            <blockquote>
                              <?php echo $results[$i]['commentContent'];?>
                            </blockquote>
                              <?php
                                $user1->setId($results[$i]['commentFrom']);
                                $user1->setUserData();
                              ?>
                            <span class="ref-desgn block"><?php echo $user1->getFullName(); ?></span>
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
