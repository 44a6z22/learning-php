<?php

    class  Mail
    {
        private $header; 
        private $to ; 
        private $message ; 
        private $subject; 
        
        
        public function     __construct ($to, $subject, $message, $header)
        {
            $this->to = $to ; 
            $this->header = $header ; 
            $this->message = $message ;
            $this->subject = $subject ; 
        }

        public function     send ()
        {
            return mail($this->to, $this->subject, $this->message, $this->header);
        }

    }

?>