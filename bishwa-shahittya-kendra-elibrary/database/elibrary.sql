CREATE TABLE book (
	bookID VARCHAR(10) NOT NULL,
	bookName VARCHAR(200) NOT NULL,
	bookWriter VARCHAR(150) NOT NULL,
	bookPublication VARCHAR(100) NOT NULL,
	bookEdition VARCHAR(10),
	bookQuantity VARCHAR(20) NOT NULL,
	bookCategory VARCHAR(10) NOT NULL,
	bookLocation VARCHAR(100),
	bookForYear VARCHAR(10),
	bookForSemester VARCHAR(5),
	bookPrice NUMERIC(8, 2),
	
	PRIMARY KEY (bookID)
);

INSERT INTO book
VALUES("phy-101", "Physics for beginner", "ABD", "LD", "3rd", "available", "Physics", "BookSelf-1, Rack-1", "Part-I", "Odd", 150.00);

INSERT INTO book
VALUES("chem-101", "Chemistry for beginner", "ABD", "LD", "3rd", "available", "Chemistry", "BookSelf-2, Rack-1", "Part-II", "Even", 150.00);

ALTER TABLE book CHANGE bookNoew bookAvailability VARCHAR(20);

CREATE USER "anonymous"@"localhost" IDENTIFIED BY "123";

GRANT 
	SELECT 
ON 
	`book-library-db`.book 
TO 
	"anonymous"@"localhost";
	
FLUSH PRIVILEGES 

SHOW GRANTS FOR "anonymous"@"localhost"

DROP user "anonymous"@"localhost"

INSERT INTO book
VALUES("phy-104", "Physics for beginner 2", "ABD", "LD", "3rd", "available", "Physics", "BookSelf-1, Rack-1", "Part-I", "Odd", 150.00),
("phy-103", "Physics for beginner 3", "ABD", "LD", "3rd", "available", "Physics", "BookSelf-1, Rack-1", "Part-I", "Odd", 150.00);

CREATE USER "register"@"localhost" IDENTIFIED BY "12345";

GRANT 
	SELECT, INSERT, DELETE, UPDATE  
ON 
	`book-library-db`.book 
TO 
	"register"@"localhost"; 

FLUSH PRIVILEGES

SHOW GRANTS FOR "register"@"localhost"

CREATE TABLE register (
	registerID INT NOT NULL AUTO_INCREMENT,
	registerName VARCHAR(200) NOT NULL,
	registerPassword VARCHAR(150) NOT NULL,
	
	PRIMARY KEY (registerID)
);

INSERT INTO register(registerName, registerPassword)
VALUE("register", "12345");

DROP TABLE register

GRANT 
	SELECT  
ON 
	`book-library-db`.register 
TO 
	"register"@"localhost"; 

FLUSH PRIVILEGES

GRANT 
	SELECT, INSERT   
ON 
	`book-library-db`.register 
TO 
	"register"@"localhost"; 
	
CREATE DATABASE elibrary;

CREATE TABLE book (
	bookID INT NOT NULL AUTO_INCREMENT,
	bookCode VARCHAR(10) NOT NULL,
	bookName VARCHAR(200) NOT NULL,
	bookWriter VARCHAR(150) NOT NULL,
	bookPublication VARCHAR(100) NOT NULL,
	bookEdition VARCHAR(10),
	bookAvailability VARCHAR(20) NOT NULL,
	bookCategory VARCHAR(10) NOT NULL,
	bookLocation VARCHAR(100),
	bookPrice NUMERIC(8, 2),
	
	PRIMARY KEY (bookID)
);

CREATE TABLE usr (
	usrID INT NOT NULL AUTO_INCREMENT,
	usrName VARCHAR(200) NOT NULL,
	usrEmail VARCHAR (120) NOT NULL,
	usrPassword VARCHAR(150) NOT NULL,
	
	PRIMARY KEY (usrID)
);

CREATE TABLE admin (
	adminID INT NOT NULL AUTO_INCREMENT,
	adminName VARCHAR(200) NOT NULL,
	adminPassword VARCHAR(150) NOT NULL,
	
	PRIMARY KEY (adminID)
);

CREATE TABLE bookInfo (
	infoID INT NOT NULL AUTO_INCREMENT,
	usrName VARCHAR(200) NOT NULL,
	bookCode VARCHAR(10) NOT NULL,
	bookReturn VARCHAR(10) NOT NULL,
	
	PRIMARY KEY (infoID)
);

DROP TABLE book

CREATE TABLE scheduleLib (
	scID INT NOT NULL AUTO_INCREMENT,
	day_name VARCHAR(15) NOT NULL,
	location VARCHAR(100) NOT NULL,
	
	PRIMARY KEY (scID)
);  

INSERT INTO scheduleLib(day_Name, location)
VALUES ("Saturday", "Off Day"),
("Sunday", "University of Rajshahi"),
("Monday","Borendra University"),
("Tuesday","Rajshahi College"),
("Wednesday","New Govt. Degree College"),
("Thursday","Rajshahi Collegiate School and College"),
("Friday","Off Day")

INSERT INTO admin(adminName, adminPassword)
VALUE ("Admin","12345");

INSERT INTO book(bookCode, bookName, bookWriter, bookPublication, bookEdition, bookAvailability, bookCategory, bookLocation, bookprice)
VALUES("phy-101", "Physics for beginner", "ABD", "LD", "3rd", "available", "Physics", "BookSelf-1, Rack-1", 150.00),
("phy-102", "Physics for beginner 2", "ABD", "LD", "3rd", "available", "Physics", "BookSelf-1, Rack-1", 150.00),
("phy-103", "Physics for beginner 3", "ABD", "LD", "3rd", "available", "Physics", "BookSelf-1, Rack-1", 150.00),
("chem-101", "Chemistry for beginner", "ABD", "LD", "3rd", "available", "Physics", "BookSelf-1, Rack-1", 150.00);

GRANT 
	SELECT 
ON 
	elibrary.book 
TO 
	"anonymous"@"localhost";

GRANT 
	SELECT 
ON 
	elibrary.scheduleLib 
TO 
	"anonymous"@"localhost";
	
FLUSH PRIVILEGES 

CREATE USER "usr"@"localhost" IDENTIFIED BY "1234";

GRANT 
	SELECT 
ON 
	elibrary.book 
TO 
	"usr"@"localhost";

GRANT 
	SELECT 
ON 
	elibrary.bookInfo 
TO 
	"usr"@"localhost";

GRANT 
	SELECT 
ON 
	elibrary.scheduleLib 
TO 
	"usr"@"localhost";
	
GRANT 
	SELECT, INSERT 
ON 
	elibrary.usr 
TO 
	"usr"@"localhost";

FLUSH PRIVILEGES

CREATE USER "admin"@"localhost" IDENTIFIED BY "12345";

GRANT 
	SELECT, INSERT, UPDATE, DELETE  
ON 
	elibrary.book 
TO 
	"admin"@"localhost";

GRANT 
	SELECT  
ON 
	elibrary.admin 
TO 
	"admin"@"localhost";
	
GRANT 
	SELECT, INSERT, UPDATE  
ON 
	elibrary.bookInfo 
TO 
	"admin"@"localhost";
	
GRANT 
	SELECT, INSERT, UPDATE, DELETE  
ON 
	elibrary.scheduleLib 
TO 
	"admin"@"localhost";
	
GRANT 
	SELECT  
ON 
	elibrary.usr 
TO 
	"admin"@"localhost";



