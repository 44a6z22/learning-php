CREATE DATABASE library ; 

USE library ; 

CREATE TABLE users(
    userId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    userUserName VARCHAR(50) UNIQUE, 
    userFirstName VARCHAR(30), 
    userLastName VARCHAR(30),
    userEmail VARCHAR(50) UNIQUE,
    userPassword VARCHAR(30),
    userBirthDate DATE
); 

CREATE TABLE books(
    bookId INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    bookTitle VARCHAR(30),
    bookAuthor INT ,
    bookPages INT,
    bookUploadDate DATE, 
    FOREIGN KEY (bookAuthor) REFERENCES users(userId)
);

CREATE TABLE comments(
	commentId INT PRIMARY KEY AUTO_INCREMENT NOT NULL , 
    commentContent VARCHAR(255), 
    commentFrom INT, 
    commentTo INT, 
    FOREIGN KEY (commentFrom) REFERENCES users(userId),
    FOREIGN KEY (commentTo) REFERENCES users(userId)
); 

CREATE TABLE followers(
	followerId INT,
    followedId INT, 
	FOREIGN KEY (followerId) REFERENCES users(userId),
    FOREIGN KEY (followedId) REFERENCES users(userId)
);

CREATE TABLE messages(
	messageId INT PRIMARY KEY AUTO_INCREMENT NOT NULL , 
    messageContent VARCHAR(255), 
    messageFrom INT, 
    messageTo INT, 
    FOREIGN KEY (messageFrom) REFERENCES users(userId),
    FOREIGN KEY (messageTo) REFERENCES users(userId)
); 
CREATE TABLE accountTypes(
	accountTypeId INT PRIMARY KEY AUTO_INCREMENT NOT NULL , 
    accountTypeTitle VARCHAR(20)
);
CREATE TABLE accounts(
	accountId INT PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    accountOwner INT, 
    accountType INT, 
    accountCreationDate DATE,
    FOREIGN KEY (accountOwner) REFERENCES users(userId),
    FOREIGN KEY (accountType) REFERENCES accountTypes(accountTypeId)
);


INSERT INTO accountTypes VALUES(NULL, "ADMIN"),
							    (NULL, "READER"), 
							    (NULL, "WRITER");

INSERT INTO users VALUES(NULL, "44a6z2", "hamza", "hamdaoui", "hhamdaoui31@gmail.com", "Hamza-_-", "1996/07/09"),
						(NULL, "Mza__", "achraf", "nafidi", "hhamdaoui31@gmail.com", "Hamza-_-", "1997/09/07"),
                        (NULL, "achraf", "anas", "rchid", "hhamdaoui31@gmail.com", "Hamza-_-", "1998/09/07"),
                        (NULL, "spir", "adnane", "rouhi", "hhamdaoui31@gmail.com", "Hamza-_-", "1990/09/07");
                        
INSERT INTO followers VALUES(2,5),
							(3,5),
                            (4,5);

INSERT INTO books VALUES(NULL,"high way to hell", curdate(),5, 399),
							(NULL,"stairway to heaven", curdate(),5, 300),
							(NULL,"arduino for beginers", curdate(),4, 400);

INSERT INTO accounts VALUES(NULL,5,1,curdate()),                            
                            (NULL,4,3,curdate());

-- JOINS --
SELECT u.userUserName , count(*)
    FROM books b INNER JOIN users u ON b.bookAuthor = u.userId
    Where u.userId = 4; -- how many books a user has published 


SELECT u.userFirstName , count(*)
    FROM followers f INNER JOIN users u ON u.userID  = f.followedId
    WHERE u.userId = 5; -- how many followers a user have 

-- getting what type of accounts a user have 
SELECT u.userFirstName AS firstname , t.accountTypeTitle AS accountType
    FROM accounts a INNER JOIN users u ON u.userId = a.accountOwner
        INNER JOIN accountTypes t ON a.accountType = t.accountTypeId
        WHERE u.userUserName =  "44a6z2" ;
