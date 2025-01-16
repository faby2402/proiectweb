CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address VARCHAR(255) DEFAULT NULL,
    cnp VARCHAR(13) DEFAULT NULL
);

INSERT INTO users (username, password, email) 
VALUES ('testuser', 'testpass', 'testuser@example
