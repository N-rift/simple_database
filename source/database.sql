CREATE DATABASE robot_db;

USE robot_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    status TINYINT DEFAULT 0
);