CREATE DATABASE library ;

USE library ;

CREATE TABLE accountTypes(
	accountTypeId INT PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    accountTypeTitle VARCHAR(20)
);

CREATE TABLE users(
    userId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    userUserName VARCHAR(50) UNIQUE,
    userFirstName VARCHAR(30),
    userLastName VARCHAR(30),
    userEmail VARCHAR(50) UNIQUE,
    userPassword VARCHAR(30),
    userBirthDate DATE,
    userType int ,
    userProfilePicture varchar(255),
    FOREIGN KEY (userType) REFERENCES accounttypes(accountTypeId)
);

CREATE TABLE books(
    bookId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    bookTitle VARCHAR(30),
    bookAuthor INT ,
    bookPages INT,
    bookUploadDate DATE,
    bookPicture varchar(50),
    FOREIGN KEY (bookAuthor) REFERENCES users(userId)
);

CREATE TABLE comments(
	commentId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
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
	messageId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    messageContent VARCHAR(255),
    messageFrom INT,
    messageTo INT,
    FOREIGN KEY (messageFrom) REFERENCES users(userId),
    FOREIGN KEY (messageTo) REFERENCES users(userId)
);

CREATE TABLE pin(
    pinId INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pinnedTo INT,
    commentId INT,
    FOREIGN KEY (pinnedTo) REFERENCES users(userId),
    FOREIGN KEY (commentId) REFERENCES comments(commentId)
);

-- INSERTS ---

INSERT INTO accountTypes VALUES(NULL, "ADMIN"),
							    (NULL, "READER"),
							    (NULL, "WRITER");

INSERT INTO users VALUES(NULL, "44a6z2", "hamza", "hamdaoui", "hhamdaoui31@gmail.com", "Hamza-_-", "1996/07/09"),
						(NULL, "Mza__", "achraf", "nafidi", "hhamdaoui31@gmail.com", "Hamza-_-", "1997/09/07"),
                        (NULL, "achraf", "anas", "rchid", "hhamdaoui31@gmail.com", "Hamza-_-", "1998/09/07"),
                        (NULL, "spir", "adnane", "rouhi", "hhamdaoui31@gmail.com", "Hamza-_-", "1990/09/07");

INSERT INTO followers VALUES(2,1),
							(3,1),
                            (4,1);

INSERT INTO books VALUES(NULL,"high way to hell", curdate(),1, 399),
							(NULL,"stairway to heaven", curdate(),1, 300),
							(NULL,"arduino for beginers", curdate(),1, 400);

INSERT INTO accounts VALUES(NULL,1,1,curdate()),
                            (NULL,2,3,curdate());


INSERT INTO messages VALUES(NULL, "wech a sat", 3, 2),
							(NULL, "fzn hani ", 2,3);

INSERT INTO comments VALUES	(NULL, "good shit", 1, 1),
							(NULL, "great", 5, 1),
							(NULL, "cool", 6, 1),
							(NULL, "great", 5, 5),
							(NULL, "cool", 5, 5),
							(NULL, "great", 5, 5);
SELECT * FROM comments ;
INSERT INTO pin VALUES 	(NULL, 1, 22),
						(NULL, 1, 23),
                        (NULL, 1, 24),
                        (NULL, 5, 25),
						(NULL, 5, 26),
                        (NULL, 5, 27);
use library ;

alter table comments 
	add column likes int not null default 0;

-- JOINS --

-- how many books a user has published
SELECT u.userUserName , count(*)
    FROM books b INNER JOIN users u ON b.bookAuthor = u.userId
    Where u.userId = 1;

-- how many followers a user have
SELECT u.userFirstName , count(*)
    FROM followers f INNER JOIN users u ON u.userID  = f.followedId
    WHERE u.userId = 1;

-- getting what type of accounts a user have
SELECT u.userFirstName AS firstname , t.accountTypeTitle AS accountType
    FROM accounts a INNER JOIN users u ON u.userId = a.accountOwner
                    INNER JOIN accountTypes t ON a.accountType = t.accountTypeId
                    WHERE u.userUserName =  "44a6z2" AND u.userPassword = "Hamza-_-" ;


-- getting messages that been sent between two users
SELECT 	m.messageContent AS "message" ,
		(SELECT u.userFirstName from users u WHERE u.userId = m.messageFrom) AS "from",
        (SELECT u.userFirstName from users u WHERE u.userId = m.messageTo) AS "To"
		FROM users u INNER JOIN messages m ON m.messageFrom = u.userId OR m.messageTo = u.userId
		where  (m.messageFrom = 1 AND m.messageTo = 2) OR (m.messageFrom = 2 AND m.messageTo = 1)
        GROUP BY m.messageFrom;

-- getting comeent that a user posted
SELECT c.commentContent FROM users u INNER JOIN comments c ON u.userId = c.commentFom WHERE u.userId = 1;

 -- getting comeent that a user has
SELECT c.commentContent FROM users u INNER JOIN comments c ON u.userId = c.commentTo WHERE u.userId = 1;

-- getting comment content of the pinned comments

 -- c.commentContent , (SELECT c.commentFrom FROM comments WHERE commentTo = 3)
SELECT c.commentFrom AS commentFrom, c.commentContent AS commentContent FROM users u INNER JOIN pin p ON u.userId = p.pinnedTo
                                    INNER JOIN comments c ON p.commentId = c.commentId
                                    WHERE u.userId = 1;

-- get the user's account type 
SELECT a.accountTypeTitle AS accountType FROM users u INNER JOIN accounttypes a ON u.userType = a.accountTypeId WHERE u.userId = 6;


-- assets

SELECT * FROM pin;

DELETE FROM pin WHERE pinId = 3;

ALTER TABLE users
	ADD COLUMN userType INT ;

ALTER TABLE users
	ADD CONSTRAINT FK_type FOREIGN KEY (userType) REFERENCES accounttypes(accountTypeId);

ALTER TABLE users
	ADD COLUMN userProfilePicture VARCHAR(50) ;

SELECT bookPicture, bookpages FROM users u INNER JOIN books b ON u.userId = b.bookAuthor WHERE u.userId = 1;



















CREATE DATABASE testlogin; 
use testlogin;
CREATE TABLE usr(
	id int primary key not null auto_increment, 
    username varchar(244), 
    userPassword varchar(244)
);

select * from usr;

use library;
select * from followers ;


SELECT count(*) FROM users u inner join followers f on f.followedId = u.userId WHERE u.userId = 4;

CREATE database testusers; 
use testusers ; 
CREATE TABLE users(
	ID int primary key not null auto_increment, 
    firstName varchar(255),
    lastName varchar(255),
    email varchar(255),
    passwords varchar(255)
);