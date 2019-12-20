# PHP-Session-Auth
This project was designed to offer a quick and simple template for PHP web applications that require authentication, saving
the time of having to implement a new system for each new projec.

## Project Details
- Built with PHP and no other outside framework
- PDO and prepared statements for database interaction
- Hashes and stores paswords securely
- Supports login, registration and logout functionality
- Automatic login is done using sessions
- Email verification
- MySQL database
- Bootstrap CSS library

## Usage

Firstly, ensure that a user is created with the required permissions, then create the `config.php` file
to connect to the database, using the following code,

### config.php :
```PHP
<?php

DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'auth');

DEFINE('DB_USER', 'your_db_user');
DEFINE('DB_PASS', 'your_db_user's_password');

// Create the PDO object database handler
try{
    $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';', DB_USER, DB_PASS);
}
catch(PDOException $e){
    exit("An unexpected connection error occurred: " . $e);
}

// PDO configurations
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
```

**Note:** Never make this file publicly accessible, do not include it in the same directory as your project, this poses a major
security risk.

After this file is created, simply insert the directory path into `util/general/header.php`

## Database Structure
The database structure is fairly simple. The database is named `auth` and contains a single table named `users`.
The users table is constructed of the following columns:
- username varchar(40)
- email varchar(40)
- fullname varchar(60)
- password varchar(255)
- user_id int(10) unsigned (auto incremented primary key)

Note: The password has a higher limit due to how that the password is not stored in plain text, a longer hash is generated instead.


