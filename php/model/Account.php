<?php
    class Account{
        private $con; 

        public function __construct($connection){
            $this->con = $connection;
        }

        public function getConnection(){
            return $this->con;
        }

        public function add($user){

            $query = "INSERT INTO users(userName, userFirstName, userLastName, userEmail, userPassword) 
                        VALUES(:userName, :firstName, :lastName, :email, :password)"; 
            $stmt = $this->getConnection()->prepare($query);
            $params = [
                ':userName' => $user->getUserName(), 
                ':firstName' => $user->getFirstName(),
                ':lastName' => $user->getLastName(), 
                ':email' => $user->getEmail(),
                ':password' => $user->getPassword()
            ];

            if($user->validate("register")){
                $stmt->execute($params);
                header('location: ../../');
            }else{
                echo 'something went wrong';
            }
        }

        public function login($user){
            $query = "SELECT COUNT(*) AS c FROM users WHERE userName = :username AND userPassword = :password";
            $stmt = $this->getConnection()->prepare($query); 
            $params = [
                ':username' => $user->getUserName(), 
                'password' => $user->getPassword()
            ];
            $result = false ;
            if($user->validate("login")){
               
                $stmt->execute($params);
                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC); //creating an associative array from the result we are getting from the SQL query 
               
                if($arr[0]['c'] == 1){
                    $result = true ; 
                }
            }else{
                echo "some of the inputs are empty !!";
            }

            return $result;
        }

    }
?>