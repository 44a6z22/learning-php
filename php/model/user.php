<?php
    class User{
        private $connection; 

        private $userId;
        private $userName; 
        private $firstName;
        private $lastName; 
        private $email; 
        private $password;
        private $userBirthDate ; // YYYY/MM/DD

        // making a constructor for the user Class 
        public function __construct(){
            $args = func_get_args();
            $num = func_num_args();
            if(method_exists($this,$f = 'init_' . $num)) {
                call_user_func_array(array($this,$f),$args);
            }
        }
        public function init_7($connection, $userName, $firstName, $lastName, $email, $password, $db){
            $this->connection = $connection;
            $this->userName = $userName; 
            $this->firstName = $firstName; 
            $this->lastName = $lastName; 
            $this->email = $email;
            $this->password = $password;
            $this->userBirthDate = $db; 
        }
        public function init_3($con, $userName, $password){
            $this->connection = $con;
            $this->userName = $userName;
            $this->password = $password;
        }
       
        public function setUserId($id){
            $this->userId = $id;
        }
        public function setConnection($id){
            $this->connection = $id;
        }
        // creating getters
        public function getConnection(){
            return $this->connection;
        }
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
        public function getBirthDate(){
            return $this->userBirthDate;
        }
        public function getFullName(){
            return $this->getFirstName().' '.$this->getLastname();
        }

        public function getUserIdFromDB(){
            $query = "SELECT userId FROM users WHERE userUserName = :username AND  userPassword = :password"; 
            $stmt = $this->getConnection()->prepare($query); 
            $params = [
                ':username' => $this->getUserName() , 
                ':password' => $this->getPassword()
            ]; 
            $stmt->execute($params);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            $this->userId =$res[0]['userId'];
            return $this->getUserId();
        }
        
        public function setUserData(){
            $query = "SELECT * FROM users where userId = :id"; 
            $stmt = $this->getConnection()->prepare($query); 
            $params = [
                ":id" => $this->getUserId()
            ]; 
            $stmt->execute($params); 
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            
            $this->userName = $res[0]['userUserName']; 
            $this->firstName = $res[0]['userFirstName']; 
            $this->lastName = $res[0]['userLastName']; 
            $this->email = $res[0]['userEmail'];
            $this->BirthDate = $res[0]['userBirthDate']; 
        }
       
         public function register(){
            $query = "INSERT INTO users VALUES(:userId, :userName, :firstName, :lastName, :email, :password, :birthDate)"; 
            $stmt = $this->getConnection()->prepare($query);
            
            $params = [
                ':userId' => NULL,
                ':userName' => $this->getUserName(), 
                ':firstName' => $this->getFirstName(),
                ':lastName' => $this->getLastName(), 
                ':email' => $this->getEmail(),
                ':password' => $this->getPassword(), 
                ':birthDate'=> $this->getBirthDate()
            ];

            if($this->validate("register")){
                $stmt->execute($params);
                header('location: ../../');
            }else{
                
                header('location: ../../register.php?action=register&Error=10');
            }
        }
        
        public function login(){
            $query = "SELECT COUNT(*) AS c FROM users WHERE userUserName = :username AND userPassword = :password";
            $stmt = $this->getConnection()->prepare($query); 
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
        public function getPinnedComments(){
            $query = 'SELECT (SELECT userFirstName FROM users WHERE userId = (SELECT * FROM users u 
                                    INNER JOIN comments c ON u.userId = c.commentFrom INNER JOIN pin p ON c.commentId = p.commentId WHERE c.commentId = p.commentId )) AS firstName,
                                     c.commentContent AS commentContent FROM users u INNER JOIN pin p ON u.userId = p.pinnedTo
                                    INNER JOIN comments c ON p.commentId = c.commentId
                                    WHERE u.userId = :id2 ;';
            $stmt = $this->getConnection()->prepare($query);
            $params = array(
                ':id1' => $this->getUserId(),
                ':id2' => $this->getUserId()
            );
            $stmt->execute($params);
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $arr; 
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
                if($this->getUserName() == "" || $this->getFirstName() == "" || $this->getLastName() == "" || $this->getEmail() == "" || $this->getPassword() == "" || $this->getBirthDate() == "" ){
                    $result = false; 
                }else{
                    $result = true; 
                }
           }
           return $result;
        }
    }
?>