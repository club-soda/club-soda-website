# Club Soda Website

## Software and Versions
- Wordpress 4.9.8

## System Dependancies
- PHP 5.3.0

## Environment Variables
None yet

## Running This Project For The First Time

For WordPress, it can be handy to use the MAMP application to run Apache and MySQL on your machine.

It also comes with phpMyAdmin, for visual management of local databases.

Download the free version of MAMP, install it, open it and click 'Start Servers' to start Apache and MySQL.

*Don't forget to update MAMP's server directory (Preferences > Document Root) to be the directory that contains your project folders.*

You can then visit localhost:8888 in your browser to see a list of your project folders. Select skeleton-wordpress to view this site.

If you're viewing the site for the first time, it will ask you to complete an install process for which you will need to create a local database (use http://localhost:8888/phpmyadmin). Name the database club-soda The default username and password for your new database will be 'root' + 'root', or 'root' + '' (empty string).

Complete the WordPress install process to get your local site connected to your local database.

Once you land at the WordPress Dashboard at the end, you can go to Appearance > Themes to activate the custom theme that is most likely where you'll be writing the php, html, css and js for this project.


Rename the wp-config-sample.php file to wp-config.php and update the database details according to your local server.
```
define('DB_NAME', 'club-soda')
define('DB_USER', 'root')
define('DB_PASSWORD', 'root')
define('DB_HOST', 'localhost:8889')
```

Run wp-admin/install.php and follow the instructions to install WordPress.

## Installing Plugins

To get The Club Soda Website up and running you will require the following plugins

*It is vital you instal the plugins in the correct order*

1. [Oystershell-Core](https://github.com/grit-and-oyster/oystershell-core) 
2. [Clubsoda-site](https://github.com/grit-and-oyster/clubsoda-site)
3. [Posts To Posts Plugin](https://wordpress.org/plugins/posts-to-posts/)
