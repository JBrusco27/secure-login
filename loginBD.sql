CREATE DATABASE IF NOT EXISTS loginBD;
USE loginBD;

CREATE TABLE IF NOT EXISTS users 
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- :O --
INSERT INTO users (username, password) VALUES ('chris', '&estaseramiPASSena1guncorreomio?');
