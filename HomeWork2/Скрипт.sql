CREATE DATABASE IF NOT EXISTS TestDb;
USE TestDb;
CREATE TABLE Customers
(
    Id INT AUTO_INCREMENT,
    Age INT,
    FirstName VARCHAR(20) NOT NULL,
    LastName VARCHAR(20) NOT NULL,
    Email VARCHAR(30),
    Phone VARCHAR(20) NOT NULL,
    CONSTRAINT `customers_pk` PRIMARY KEY(Id),
    CONSTRAINT `customer_phone_uq` UNIQUE(Phone)
);

CREATE TABLE Users
(
    id INT NOT NULL AUTO_INCREMENT,
    fullName VARCHAR(50) NOT NULL CHECK (fullname!=''),
    login VARCHAR(20) NOT NULL CHECK (login!=''),
    password VARCHAR(20) NOT NULL CHECK (password!=''),
    email VARCHAR(20) NOT NULL CHECK (email!=''),
    CONSTRAINT users_id_pk PRIMARY KEY(Id),
    CONSTRAINT users_login_uq UNIQUE(login),
    CONSTRAINT users_email_uq UNIQUE(email)
);