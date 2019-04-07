<?php
    class Account{
        private $con; 
        private $accountType ;


        public function __construct($connection){
            $this->con = $connection;
        }


        public function getConnection(){
            return $this->con;
        }

        public function getAccountType(){
            return $this->accountType ; 
        }

        public function register($user){
            $query = "INSERT INTO users VALUES(:userId, :userName, :firstName, :lastName, :email, :password, :birthDate)"; 
            $stmt = $this->getConnection()->prepare($query);
            
            $params = [
                ':userId' => NULL,
                ':userName' => $user->getUserName(), 
                ':firstName' => $user->getFirstName(),
                ':lastName' => $user->getLastName(), 
                ':email' => $user->getEmail(),
                ':password' => $user->getPassword(), 
                ':birthDate'=> $user->getBirthDate()
            ];

            if($user->validate("register")){
                $stmt->execute($params);
                header('location: ../../');
            }else{
                
                header('location: ../../register.php?action=register&Error=10');
                echo $user->validate("register");
            }
        }

        public function login($user){
            $query = "SELECT COUNT(*) AS c FROM users WHERE userUserName = :username AND userPassword = :password";
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