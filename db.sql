-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS your_database;

-- Use the database
USE your_database;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);