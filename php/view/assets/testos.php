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
                            foreach ( $results as $res)
                            {
                        ?>
                        <div>
                            <blockquote>
                            <?php   echo $res['commentContent']; ?>
                            </blockquote>
                            <?php
                                $user1->setId($res['commentFrom']);
                                $user1->setUserData();
                            ?>
                            <span class="ref-desgn block">
                            - <?php   echo $user1->getFullName(); ?>
                            </span>
                        </div>

                        <?php
                            }
                        ?>
                        </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </section>
<!--/References Sec-->
