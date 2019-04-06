<?php
    session_start();
    if(!isset($_SESSION['userLogin'])){
        header('location: register.php');
    }
    include "php/config.php";
    $user = new User(); 
    $user->setUserData($connection, $_SESSION['userLogin']);
?>

<?php include "php/view/header/header.php"; ?>
   
     <title> GALERY  </title>
</head>
<body>
    <div class="container">  
        <?php
            if(isset($_GET['Error'])){

                $err = intval($_GET['Error']); 
                if($err == 4 ) include("php/errors/err.php");
            }
        ?>
        <div class="row justify-content-center">
            <div class="profile-head">
                <?php require("php/view/gallery/profilePic.php"); ?>
                <h2>Hello <?php echo $user->getUserName();?></h2>
            </div>
        </div>  
        <div class="row justify-content-center">
            <?php require("php/view/forms/uploadForm.php"); ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                
                <form action="php/controller/logoutHandler.php" method="POST">
                    <input type="submit" class="btn btn-danger btn-block lg-btn" value="logout">
                </form>  

            </div> 
        </div>
        <div class="row jusify-content-center ">
            <?php require("php/view/gallery/picsGallery.php"); ?>
        </div>
    </div>
</body>
</view>