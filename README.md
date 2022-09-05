# mygamelist
My Game List
You can see it in action at <a href="https://mygames.andrewzaw.com" target="_blank">https://mygames.andrewzaw.com</a>

Games from your own game collection that you can add and rate.
The application will be using PHP and mySQL.

# Installation

1) First clone the repo.
2) Edit the /Model/DatabaseConfig.php

  class DatabaseConfig
  {
    const
    DB_HOST = '<the host name to your mySQL here>',
    DB_NAME = '<the name of the database here>',
    DB_USER = '<user name to connect to this database>',
    DB_PASS = '<the password to connect to this database>';
  }

3) Run the "install.sql". There are two options.

  a) You can use phpMyAdmin or other admin toold to administer your database to import the "install.sql" file.
  or
  b) On command line: `mysql -u [user] -p < install.sql`

# Would do with more time

This is what I would do with more time.
I would implement thumbnails of games. (This will involve uploading images, cropping and resizing).
Link to the Steam or GoG library.

# Validation and cleaning

There are two end points to clean and sanitize.
Data entered on the server end is sanitized using placeholders by using `PDO::prepare()` and `PDOStatement::execute()`.

# Validation

Two steps in the validation process.
1) Validation client side to ensure the required data is not left blank or wrong values being entered with instant feedback.
2)

# Scaling or Failing
