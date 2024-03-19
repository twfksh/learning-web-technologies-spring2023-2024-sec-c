<?php

/*

CREATE TABLE users (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(155) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `headline` TEXT,
    `username` VARCHAR(155) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `org` VARCHAR(155),
    `role` VARCHAR(50),
    `gender` VARCHAR(20) NOT NULL,
    `dob` DATE NOT NULL
)
ENGINE InnoDB;

CREATE TABLE `opencrowd`.`comments` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `parent_id` INT NOT NULL,
    `comment` TEXT NOT NULL, 
    `sender` VARCHAR(155) NOT NULL, 
    `date` DATE NOT NULL
) ENGINE = InnoDB;

CREATE TABLE `opencrowd`.`products` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `name` VARCHAR(255) NOT NULL, 
    `headline` TEXT NOT NULL, 
    `description` TEXT NOT NULL, 
    `url` VARCHAR(255) NOT NULL,
    `img` VARCHAR(255) NOT NULL, 
    `votes` INT NOT NULL,
    `launch_date` DATE NOT NULL
) ENGINE = InnoDB;

*/

$db = [
    "host"=> "localhost",
    "user"=> "root",
    "passwd"=> "",
    "database"=> "opencrowd"
];


function getDatabaseConnection() {
    $db = $GLOBALS['db'];
    $conn = mysqli_connect($db['host'], $db['user'], $db['passwd'], $db['database']);
    if (!$conn) {
        die("Failed to connecto to the database!");
    }
    return $conn;
}