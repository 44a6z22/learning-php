<?php
    session_start();
    if(isset($_SESSION['userLogin'])){
        header('location: ./');
    } 
?>

<?php require("php/view/header/header.php");?>

    <title>
        <?php 
            if(isset($_GET['action'])){
                echo $_GET['action'];
            }else{
                echo "login";
            }
        ?>
    </title>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <a href="?action=register">REGISTER</a>
            <a href="?action=login">LOGIN</a>
        </div>

        <div class="row justify-content-center ">
            <?php
                if(isset($_GET['action'])){

                    $action = $_GET['action'];

                    if($action == "login" ){
                        include "php/view/forms/loginForm.php";
                    }else if( $action == "register"){
                        include "php/view/forms/registerForm.php";
                    }

                }else{
                    include "php/view/forms/loginForm.php";
                }
            
            ?>  
        </div>
    </div>
</body>
</view>