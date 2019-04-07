<?php
    class User{
        private $userId;
        private $userName; 
        private $firstName;
        private $lastName; 
        private $email; 
        private $phoneNumber = "098765432345678"; 
        private $adress = "jshdfhlk sdoyuf sdfus dl"; 
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
        public function setUserId($id){
            $this->userId = $id;
        }


        // creating getters
        public function getUserId(){
            return $this->userId; 
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
        public function getPhoneNumber(){
            return $this->phoneNumber;
        }
        public function getAdress(){
            return $this->adress;
        }

        public function getUserIdFromDB($connection){
            $query = "SELECT userId FROM users WHERE userName = :username AND  userPassword = :password"; 
            $stmt = $connection->prepare($query); 
            $params = [
                ':username' => $this->getUserName() , 
                ':password' => $this->getPassword()
            ]; 
            $stmt->execute($params);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            $this->setUserId($res[0]['userId']);
            return $this->getUserId();
        }
        
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
       
        public function validate($type){
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