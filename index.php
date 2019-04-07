<?php
    session_start();
    if(!isset($_SESSION['userLogin'])){
        header('location: register.php');
    }
    include "php/config.php";
    $id = $_SESSION['userLogin'];
    $user = new User(); 
    $user->setUserData($connection, $id);
?>

<?php include "php/view/assets/header.php"; ?>
   
     <title> GALERY  </title>
</head>
<body>
    <div class="container">  
        <?php
            if(isset($_GET['Error'])){

                $err = intval($_GET['Error']); 
                include("php/view/errors/err.php");
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
<?php require("php/view/assets/footer.php");?>