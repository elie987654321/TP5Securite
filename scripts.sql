CREATE DATABASE DDOS;

SELECT NOW(3);

DROP TABLE visitor;

CREATE TABLE visitor (
id INT PRIMARY KEY AUTO_INCREMENT,
ipAddress CHAR(255),
lastConnection TIME(3)
);

SELECT lastConnection FROM visitor;
INSERT INTO visitor (ipAddress, lastConnection) VALUES ("127.0.0.1", NOW(3))
