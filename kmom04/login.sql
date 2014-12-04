DROP TABLE IF EXISTS USER;
 
CREATE TABLE USER
(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80),
  password CHAR(32),
  salt INT NOT NULL
) ENGINE INNODB CHARACTER SET utf8;
 
INSERT INTO USER (name, salt) VALUES 
  ('David', unix_timestamp()),
  ('Administrator', unix_timestamp())
;
 
UPDATE USER SET password = md5(concat('password', salt)) WHERE id = 1;
UPDATE USER SET password = md5(concat('password', salt)) WHERE id = 2;
 
SELECT * FROM USER;