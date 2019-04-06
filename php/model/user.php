<?php
    class User{
        private $userName; 
        private $firstName;
        private $lastName; 
        private $email; 
        private $password;

        // making a constructor for the user Class 
        public function __construct(){
            $args = func_get_args();
            $num = func_num_args();
            if(method_exists($this,$f = 'init_' . $num)) {
                call_user_func_array(array($this,$f),$args);
            }
        }
        public function init_5($userName, $firstName, $lastName, $email, $password){
            $this->userName = $userName; 
            $this->firstName = $firstName; 
            $this->lastName = $lastName; 
            $this->email = $email;
            $this->password = $password;
        }
        public function init_2($userName, $password){
            $this->userName = $userName;
            $this->password = $password;
        }
        // creating setters
        
        public function setUserData($connection, $id){
            $query = "SELECT * FROM users where userId = :id"; 
            $stmt = $connection->prepare($query); 
            $params = [
                ":id" => $id
            ]; 
            $stmt->execute($params); 
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            $this->userName = $res[0]['userName']; 
            $this->firstName = $res[0]['userFirstName']; 
            $this->lastName = $res[0]['userLastName']; 
            $this->email = $res[0]['userEmail']; 
        }
        // creating getters
        public function getUserId($connection){
            $query = "SELECT userId FROM users WHERE userName = :username AND  userPassword = :password"; 
            $stmt = $connection->prepare($query); 
            $params = [
                ':username' => $this->getUserName() , 
                ':password' => $this->getPassword()
            ]; 
            $stmt->execute($params);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $res[0]['userId'];

        }
        public function getUserName(){
            return $this->userName; 
        }
        public function getFirstName(){
            return $this->firstName;
        }
        public function getLastName(){
            return $this->lastName;
        }
        public function getEmail(){
            return $this->email; 
        }
        public function getPassword(){
            return $this->password;
        }
        //  CRUD

        public function add($connection){

            $query = "INSERT INTO users(userName, userFirstName, userLastName, userEmail, userPassword) 
                        VALUES(:userName, :firstName, :lastName, :email, :password)"; 
            $stmt = $connection->prepare($query);
            $params = [
                ':userName' => $this->getUserName(), 
                ':firstName' => $this->getFirstName(),
                ':lastName' => $this->getLastName(), 
                ':email' => $this->getEmail(),
                ':password' => $this->getPassword()
            ];

            if($this->validate("register")){
                $stmt->execute($params);
                header('location: ../../');
            }else{
                echo 'something went wrong';
            }
        }

        public function login($connection){
            $query = "SELECT COUNT(*) AS c FROM users WHERE userName = :username AND userPassword = :password";
            $stmt = $connection->prepare($query); 
            $params = [
                ':username' => $this->getUserName(), 
                'password' => $this->getPassword()
            ];
            $result = false ;
            if($this->validate("login")){
               
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

        private function validate($type){
            // throw some code in here 
           if($type == "login"){
                if($this->getUserName() == "" || $this->getPassword() == ""){
                    $result = false ; 
                }else{
                    $result = true ; 
                }
           }else if($type == "register"){
                if($this->getUserName() == "" || $this->getFirstName() == "" || $this->getLastName() == "" || $this->getEmail() == "" || $this->getPassword() == "" ){
                    $result = false; 
                }else {
                    $result = true; 
                }
           }
           return $result;
        }
    }
?>