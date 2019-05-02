<?php
    class Errors{
        // input related errors
        public static 	$USER_NOT_FOUND = "your username or password is wrong";
        public static 	$INPUTS_EMPTY = "One of the inputs is empty. ";

        // upload related errors
        public static 	$MAX_SIZE = "The uploaded file exceeds the upload max file size";
        public static 	$WRITE_FAILURE = "Failed to write file to disk.";
        public static 	$PARTIALY_UPLOADDED = "The uploaded file was only partially uploaded.";
        public static 	$NO_FILE = "No file was uploaded.";


        // overAll vars 
        public static   $NO_BOOKS = "this users haven't uploaded any books  yet.";
        public static   $PIN_FAIL = "failled to pin this comment.";

    }
    Class EMAIL{
        
        public static   $MAIL_HEADER ; 
        public static   $MAIL_MESSAGE = "your account has been created successfuly please comfirm your registration Via This link"; 
        public static   $MAIL_REGISTER_SUBJECT = "Comfirm your registration" ; 
        

    }
?>
