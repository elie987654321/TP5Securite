CREATE DATABASE DDOS;

SELECT NOW(3);

DROP TABLE visitor;

CREATE TABLE visitor (
id INT PRIMARY KEY AUTO_INCREMENT,
ipAddress CHAR(255),
lastUpdate TIME,
connSinceLastUpdate int
);
SELECT * FROM visitor;
SELECT lastConnection FROM visitor;
INSERT INTO visitor (ipAddress) VALUES ("::1");
SELECT * FROM visitor;