CREATE DATABASE users;

use users;

CREATE TABLE role(
    roleId int PRIMARY KEY AUTO_INCREMENT,
    name enum('admin','user'));

CREATE TABLE users(
    ID int PRIMARY KEY AUTO_INCREMENT,
    name varchar(50),
    email varchar(50),
    roleId int,
    FOREIGN KEY (roleId) REFERENCES role(roleId));