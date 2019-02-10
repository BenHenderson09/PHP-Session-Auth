# PHPSessionAuth
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

## Database Structure
The database structure is fairly simple. The database is named `auth` and contains a single table named `users`.
The users table is constructed of the following columns:
- username varchar(40)
- email varchar(40)
- fullname varchar(60)
- password varchar(255)
- user_id int(10) unsigned

Note: The password has a higher limit due to the way that the password is not stored in plain text, a longer hash is generated instead.
