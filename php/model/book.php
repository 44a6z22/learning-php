<?php
    class Book{
        private $connection;
        private $bookId;
        private $bookName;
        private $bookAuthor;
        private $bookpages;
        private $bookUploadDate;

        public function __contruct($bookName, $bookAuthor, $bookpages, $bookUploadDate){
            $this->bookName = $bookName;
            $this->bookAuthor = $bookAuthor;
            $this->bookPages = $bookpages;
            $this->bookUploadDate = $bookUploadDate;
        }
        // setting setters
        public function setBookId($id){
          $this->bookId = $id;
        }

        // setting getters
        public function getBookName(){
            return $this->bookName;
        }
        public function getBooAuthor(){
            return $this->bookAuthor;
        }
        public function getBookPages(){
            return $this->bookPages;
        }
        public function getBookId(){
          return $this->bookId;
        }

        // adds a book to the books table
        public function add(){
            $query = "INSERT INTO books VALUES(NULL,:title, curdate(),:authorId, :pages);";
            $stmt = $this->connection->prepare($query);
            $params = array(
                ':title' => $this->getBookName(),
                ':authorId' => $this->getBookAuthor(),
                ':pages' => $this->getBookPages()
            );
            $stmt->execute($params);
        }

        // deletes a book from the books table
        public function delete(){
          $query = "DELETE FROM books WHERE bookId = :id;";
          $stmt = $this->getConnetion()->prepare($query);
          $params = array(
            ':id' : $this->getBookId()
          );
          $stmt->execute($params);
        }

        public function editTitle(){
            // throw some code in here
        }

        public function editPages(){
            // throw some code in here
        }


    }
?>
