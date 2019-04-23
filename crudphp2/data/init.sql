CREATE DATABASE crud;

  use crud;

  CREATE TABLE personne (
    per_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    per_firstname VARCHAR(30) NOT NULL,
    per_lastname VARCHAR(30) NOT NULL,
    per_email VARCHAR(50) NOT NULL,
    per_age INT(3),
    per_location VARCHAR(50),
    date TIMESTAMP
  );
