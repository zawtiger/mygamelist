#This is to create a new mygames Database and my games list table.

#Create the database "mygames"
CREATE DATABASE IF NOT EXISTS mygames CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

#Now created the table if it does not exists
CREATE TABLE IF NOT EXISTS mygames.game_list 
( 
id INT NOT NULL AUTO_INCREMENT ,  
publisher VARCHAR(255) NOT NULL ,  
name VARCHAR(255) NOT NULL ,  
nickname VARCHAR(255) NULL DEFAULT NULL ,  
rating ENUM('1','2','3','4','5') NULL DEFAULT NULL,
created_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
INDEX  (id)
)

ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

#Make sure that the id cannot be left blank
ALTER TABLE game_list ADD PRIMARY KEY(id);

#Make the combination of publisher and name a unique combo so there will be no others like it.
ALTER TABLE game_list ADD UNIQUE( publisher, name);

#Make it searchable.
ALTER TABLE game_list ADD FULLTEXT( publisher, name, nickname);