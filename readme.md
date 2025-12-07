# PHP Login System

## Description
A simple PHP login system with PDO, password hashing, and sessions.

## Features
- Register user
- Login user
- Dashboard (protected page)
- Logout

## Requirements
- PHP >= 7.4
- MySQL / MariaDB
- XAMPP or other server

## Database
Database name: `login`  
Table name: `info`  
Columns: 
- `id` INT AUTO_INCREMENT PRIMARY KEY
- `username` VARCHAR(50)
- `email` VARCHAR(50)
- `password` VARCHAR(255)

## How to Run
1. Clone the repository
2. Import database
3. Open project in localhost
4. Register & Login
