<?php
    ob_start();
    
	$timezone = date_default_timezone_set("Europe/London");

    $dbString = "mysql:host=127.0.0.1; dbname=library; charset=utf8mb4";
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];
    
    $dbParams = [
        "user" => "root", 
        "pass" => ""
    ];
    
    try{
        $connection = new PDO(  $dbString,
                                $dbParams["user"],
                                $dbParams["pass"],
                                $options
                            );
    }catch(Exeption $e){
        error_log($e->getMessage());
        exit('Something weird happened'); //something a user can understand
    }
?>