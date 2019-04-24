<?php
	class 	Book
	{
        private 	$connection;
        private 	$bookId;
        private 	$bookName;
        private 	$bookAuthor;
		private 	$bookPages;
        private 	$bookUploadDate;
        private 	$bookPicture;

        public function   __contruct()
        {}

        public function   setConnection($con)
        {
			$this->connection = $con;
        }

        public function   setTitle($title)
        {
			$this->bookTitle = $title;
        }

        public function   setAuthor($auth)
        {
			$this->bookAuthor = $auth;
        }

        public function setPages($pages)
        {
			$this->bookPages = $pages;
        }

        public function   setPicture($pic)
        {
			$this->bookPicture = $pic;
        }

        ///
        public function   getConnection()
        {
			return $this->connection ;
        }
        
        public function   getTitle()
        {
			return $this->bookTitle ;
        }

        public function   getAuthor()
        {
			return $this->bookAuthor ;
        }

        public function   getPages()
        {
			return $this->bookPages ;
        }
        
        public function   getPicture()
        {
			return $this->bookPicture;
        }

        public function   add()
        {
			$query = "INSERT INTO books VALUES(NULL, :title, :author, :pages, CURDATE(), :picture);";
			
			$stmt = $this->getConnection()->prepare($query);
			$params = array(
				":title" => $this->getTitle(),
				":author" => $this->getAuthor(),
				":pages" => $this->getPages(),
				":picture" => $this->getPicture()
			);
			
			$stmt->execute($params);
        }
        
		public function 	getBooks()
		{
			$query = "SELECT b.bookTitle AS bookName, b.bookUploadDate AS uploadDate , b.bookPicture AS bookPicture, b.bookpages AS bookpages FROM users u INNER JOIN books b ON u.userId = b.bookAuthor WHERE u.userId = :author;";
			
			$stmt = $this->getConnection()->prepare($query);
			$params = array(
				":author" => $this->getAuthor()
			);
			
			$stmt->execute($params);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $result;
        }

        //
        // public function verifyPages(){
        //   if(isNAN);
        // }
    }
?>
