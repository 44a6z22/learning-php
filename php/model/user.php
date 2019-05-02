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
        private $profilePicture;
        private $profileType;
        private $uniqId ; 

        // making a constructor for the user Class
        public function     __construct()
        {
            $args = func_get_args();
            $num = func_num_args();
            
            if( method_exists( $this, $f = 'init_' . $num ) ) 
            {
                call_user_func_array(   array( $this,   $f ),   $args );
            }
        }
        public function     init_1($con)
        {
            $this->connection = $con;
        }
        public function     init_3($con, $userName, $password)
        {
            $this->connection = $con;
            $this->userName = $userName;
            $this->password = $password;
        }
        public function     init_9($connection, $userName, $firstName, $lastName, $email, $password, $bd, $tpe, $uniqId)
        {
            $this->connection = $connection;
            $this->userName = $userName;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->userBirthDate = $bd;
            $this->profileType = $tpe;
            $this->uniqId = $uniqId; 
        }


        public function     setId(  $id)
        {
            $this->userId = $id;
        }

        public function     setConnection($con)
        {
            $this->connection = $con;
        }
        
        public function     setProfilePicture($pp)
        {
            $this->profilePicture = $pp;
        }
        
        public function     setUniqId($ui)
        {
          $this->uniqId = $ui;
        }
        
        // creating getters
        public function     getConnection()
        {
            return $this->connection;
        }

        public function     getBirthDate()
        {
          return $this->userBirthDate;
        }
        
        public function getId(){
            return $this->userId;
        }
        
        public function     getUserName()
        {
            return $this->userName;
        }
        
        public function     getFirstName()
        {
            return $this->firstName;
        }
        
        public function     getLastName()
        {
            return $this->lastName;
        }
        
        public function     getEmail()
        {
            return $this->email;
        }
        
        public function     getPassword()
        {
            return $this->password;
        }

        public function     getProfilePicture()
        {
          return $this->profilePicture;
        }
        
        public function     getUniqId()
        {
          return $this->uniqId;
        }
        

        public function     getFullName()
        {
            return $this->getFirstName() . ' ' . $this->getLastname();
        }
        
        
        
        public function     getProfileType()
        {
            return $this->profileType;
        }

        public function     getAge()
        {
          //date in mm/dd/yyyy format; or it can be in other formats as well
           $birthDate = $this->userBirthDate;
           //explode the date to get month, day and year
           $birthDate = explode("-", $birthDate);
           //get age from date or birthdate
           $age =   (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") // if this is true 
                    ?   ((date("Y") - $birthDate[0]) - 1)   // do this 
                    :   (date("Y") - $birthDate[0]));   // esle do this 
           return  $age;
        }

        public function     getType()
        {
            $query =  "SELECT a.accountTypeTitle AS accountType FROM users u INNER JOIN accounttypes a ON u.userType = a.accountTypeId WHERE u.userId = :id";
            $stmt =   $this->getConnection()->prepare($query);
            $params =   array(
                ":id" => $this->getId()
            );

            $stmt->execute($params);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->profileType = $res[0]['accountType'];
        }

        public function     getUserType()
        {
          $this->getType();
          return $this->profileType;
        }
        
        public function     getUserIdFromDB()
        {
            $query = "SELECT userId FROM users WHERE userUserName = :username AND  userPassword = :password";
            $stmt = $this->getConnection()->prepare($query);
            $params = array(
                ':username' => $this->getUserName(),
                ':password' => $this->getPassword()
            );
            $stmt->execute($params);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->userId =$res[0]['userId'];
            return $this->getId();
        }

        public function     setUserData()
        {
            $query = "SELECT * FROM users where userId = :id";
            $stmt = $this->getConnection()->prepare($query);
            $params = array(
                ":id" => $this->getId()
            );
            $stmt->execute($params);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->userName = $res[0]['userUserName'];
            $this->firstName = $res[0]['userFirstName'];
            $this->lastName = $res[0]['userLastName'];
            $this->email = $res[0]['userEmail'];
            $this->userBirthDate = $res[0]['userBirthDate'];
            $this->profilePicture = $res[0]['userProfilePicture'];
            $this->uniqId = $res[0]['uniqId'];
        }

         public function register(){
            $query = "INSERT INTO users(userUserName, userFirstName, userLastName, userEmail, userPassword, userBirthDate, userType, uniqId)
              VALUES(:userName, :firstName, :lastName, :email, :password, :birthDate, :userType, :uniqId )";
            $stmt = $this->getConnection()->prepare($query);

            $params = array(
                ':userName' => $this->getUserName(),
                ':firstName' => $this->getFirstName(),
                ':lastName' => $this->getLastName(),
                ':email' => $this->getEmail(),
                ':password' => $this->getPassword(),
                ':birthDate'=> $this->getBirthDate(),
                ':userType' => $this->getProfileType(), 
                ':uniqId' => $this->getUniqId()
            );

            if($this->validate("register")){
                $stmt->execute($params);
                return 1; 
            }else{
                return 0; 
                
            }
        }

        public function     login()
        {
            $query = "SELECT COUNT(*) AS 'count' FROM users WHERE userUserName = :username AND userPassword = :password AND status = 'ACTIVE';";
            $stmt = $this->getConnection()->prepare($query);
            $params = array(
                ':username' => $this->getUserName(),
                'password' => $this->getPassword()
            );

            $result = false ;
            if( $this->validate("login") )
            {
                $stmt->execute($params);
                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if( $arr[0]['count'] == 1 )
                {
                    $result = true ;
                }
            }
            else
            {
                echo "some of the inputs are empty !!";
            }

            return $result;
        }

        public function     updateStatus()
        {
            $query = "UPDATE users SET status = 'ACTIVE' WHERE uniqId = :ui;"; 
            $stmt = $this->getConnection()->prepare($query); 

            $params = array(
                ':ui' => $this->getUniqId()
            );

            if ($stmt->execute($params)) return true ; 
                
            return false;

        } 

        public function addProfilePicture(){
          $query = "UPDATE users SET userProfilePicture = :profilePictureLink WHERE userId = :id;";
          $stmt = $this->getConnection()->prepare($query);
          $params = array(
            ':profilePictureLink' => $this->getProfilePicture(),
            ':id' => $this->getId()
          );

          try
          {
            $stmt->execute($params);
          }
          catch(Exeption $e)
          {
            echo $e->getMessage();
          }
          // header('location: ../../profile.php');
        }

        public function     getPinnedComments()
        {
            $query = 'SELECT c.commentFrom AS commentFrom, c.commentContent AS commentContent FROM users u INNER JOIN pin p ON u.userId = p.pinnedTo
                                    INNER JOIN comments c ON p.commentId = c.commentId
                                    WHERE u.userId = :id2 ;';
           
            $stmt = $this->getConnection()->prepare($query);
            $params = array(
                ':id2' => $this->getId()
            );
        
            $stmt->execute($params);
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $arr;
        }

        private function     validate($type)
        {
            // throw some code in here
           if($type == "login")
           {
                if($this->getUserName() == "" || $this->getPassword() == "")
                {
                    $result = false ;
                }else{
                    $result = true ;
                }
           }
           else if($type == "register")
           {
                if($this->getUserName() == "" || $this->getFirstName() == "" || $this->getLastName() == "" || $this->getEmail() == "" || $this->getPassword() == "" || $this->getBirthDate() == "" )
                {
                    $result = false;
                }
                else
                {
                    $result = true;
                }
           }
           return $result;
        }
    
    
        public function     follows($account)
        {
            $query = "INSERT INTO followers VALUES (:this, :that);"; 
            $stmt = $this->getConnection()->prepare($query);
            
            $params = array(
                ':this' => $this->getId(),
                ':that' => $account->getId()
            );
    
            $stmt->execute($params);
            
        }
    }
?>
