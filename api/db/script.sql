
CREATE DATABASE IF NOT EXISTS
    bancoteste;
USE bancoteste;
DROP TABLE IF EXISTS products;
CREATE TABLE IF NOT EXISTS products (
    id INT(11) AUTO_INCREMENT,
    name VARCHAR(255),
    price DECIMAL(10,2),
    PRIMARY KEY (id)
);

INSERT INTO products VALUE(0, 'Curso de Docker', 2500);
INSERT INTO products VALUE(0, 'Curso de JS', 2000);
