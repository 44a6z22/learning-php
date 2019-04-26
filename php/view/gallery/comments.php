<style>
</style>
<?php
    
    $comments = new comment($connection);
    $comments->setReciver($id);
    $allComments = $comments->getComments();

    $sender = new User($connection);

    $assets = array(
        'counter' => 0, 
        'limit' => sizeOf($allComments),
    );
        
    while($assets['counter'] < $assets['limit'])
    { 
        $sender->setId($allComments[$assets['counter']]['commentFrom']);
        $sender->setUserData();
?>
        <!-- new comment -->
        <div class="new_comment">

        <!-- build comment -->
            <ul class="user_comment">

                <!-- current #{user} avatar -->
                <div class="user_avatar">
                    <img src="<?php echo "php/upload/" . $sender->getId() . "/profilePictures/" . $sender->getProfilepicture() ;  ?>">
                </div><!-- the comment body -->
                <div class="comment_body">
                    <p>
                        <?php
                            echo $allComments[$assets['counter']]['commentContent'];
                        ?>
                    </p>
                </div>

                <!-- comments toolbar -->
                <div class="comment_toolbar">
                    <!-- inc. date and time -->
                    <div class="comment_details">
                        <ul>
                            <!-- <li><i class="fa fa-clock-o"></i> 13:94</li>
                            <li><i class="fa fa-calendar"></i> 04/01/2015</li> -->
                            <li><i class="fa fa-pencil"></i> <span class="user"> <?php echo $sender->getFullName(); ?></span></li>
                        </ul>
                    </div><!-- inc. share/reply and love -->
                    <div class="comment_tools">
                        <ul>
                            <?php
                                if( !isset($_GET['userId']) || $_GET['userId'] == $_SESSION['userLogin'] )
                                {   
                            ?>
                                <li>
                                    <a href="php/controller/commentsActions/pinComment.php?commentId=<?php echo $allComments[$assets['counter']]['commentId']; ?>&commentTo=<?php echo $_SESSION['userLogin'];?> " >
                                        <i class="fa fa-thumb-tack"></i>
                                    </a>
                                </li>
                            <?php
                                }
                            ?>
                            <!-- <li><i class="fa fa-reply"></i></li> -->
                            <li><i class="fa fa-heart love"></i></li>
                        </ul>
                    </div>

                </div>
            </ul>

        </div>
<?php
    $assets['counter']++;
    }
?>