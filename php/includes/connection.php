<?php
	class	DB
	{
      static public 	$DB_LINK = "mysql:host=127.0.0.1; dbname=library; charset=utf8";
      static public 	$DB_LOGIN = "root";
      static public 	$DB_PASS = "";
      static public 	$DB_OPTIONS = array(
          PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
	  );
	}
	
	try
	{
		$connection = new PDO( DB::$DB_LINK, DB::$DB_LOGIN, DB::$DB_PASS, DB::$DB_OPTIONS);
	}
	catch(Exeption $e)
	{
		error_log($e->getMessage());
    }
?>
