-- USE stars;
-- CREATE TABLE users (
-- id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
-- username VARCHAR(50),
-- pass VARCHAR(50)stars
-- );

INSERT INTO users
(username, pass)
VALUES
("Cyrus","fag123");

SELECT * FROM users;

CREATE TABLE starinfo (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_id INT,
	image VARCHAR()
);

INSERT INTO starinfo
(user_id, image)
VALUES
("1","stars_1.png");


