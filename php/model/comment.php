<?php
    class   Comment
    {
        private     $connection; 

        private     $commentId; 
        private     $commentSender; 
        private     $commentReciver; 
        private     $commentContent ;
        private     $likes;
        
      
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

        
        public function    init_1($con)
        {
            $this->connection = $con;
        }

        public function     init_5($con, $sender, $reciver, $content, $likes )
        {
            $this->connection = $con;
            $this->commentSender = $sender;
            $this->commentReciver = $reciver; 
            $this->commentContent = $content; 
            $this->likes = $likes;
        }
        
        
        // creating SETTERS  
        public function     setId($id){

            if(is_numeric($id))
                $this->commentId = $id;
                
        }
        public function     setSender($sender)
        {
            $this->commentSender = $sender;
        }
 
        public function     setReciver($reciver)
        {   
            $this->commentReciver = $reciver;
        }
         
        public function     setcontent($content)
        {
            $this->commentContent = $content;
        }
        
        public function     setLikes($likes)
        {
            $this->likes = $likes; 
        }
        // creating GETTERS

        public function     getConnection()
        {
            return $this->connection ; 
        }

        public function     getId()
        {
            return $this->commentId; 
        }
        
        public function     getSender(){
            return $this->commentSender;
        }
        
        public function     getReciver(){
            return $this->commentReciver;
        }
        
        public function     getContent(){
            return $this->commentContent;
        }
          public function     getLikes()
        {
            return $this->likes; 
        }

        public function     add()
        {
            $query = "INSERT INTO comments VALUES (NULL, :content, :sender, :reciver, :likes); "; 
            $stmt = $this->getConnection()->prepare($query);

            $params = array(
                ':content' => $this->getContent(), 
                ':sender' => $this->getSender(),
                ':reciver' => $this->getReciver(), 
                ':likes' => $this->getLikes()
            );

            $res = $stmt->execute($params);

            return $res;
        }

        public function     getComments(){
            $query = "SELECT * FROM comments WHERE commentTo = :id ORDER BY commentId DESC ;"; 
            $stmt = $this->getConnection()->prepare($query);

            $params = array( 
                ':id' => $this->getReciver()
            );
            
            $stmt->execute($params);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //
            return $res;
        }
        
        public function     pin()
        {  
            $query = "INSERT INTO pin( pinnedTo, commentId) VALUES(:userId,:commentId);";
            $stmt = $this->getConnection()->prepare($query);

            $params = array( 
                'userId' => $this->getReciver(),
                'commentId' => $this->getId()
            );
            
            if($stmt->execute($params))
            {
                return 1 ;
            }
            else {
                return 0 ; 
            }
            
        }

    }
?>