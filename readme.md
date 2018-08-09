# Club Soda Website

## Installation Process

### Step 1 - Wordpress Instalation

If you have some technical background, you can skip the detailed steps in this ReadMe. Here are the simplified steps on how to install WordPress on a local computer:

1. Install a local server (Mac: [MAMP] (http://www.mamp.info), PC:XAMPP or WAMP).

2. Create a new database called club-soda

3. Download WordPress from [wordpress.org] (http://wordpress.org/download/) and extract the files to a new folder under the htdocs folder.

4. Rename the wp-config-sample.php file to wp-config.php and update the database details according to your local server.
```
define('DB_NAME', 'club-soda')
define('DB_USER', 'root')
define('DB_PASSWORD', 'root')
define('DB_HOST', 'localhost:8889')
```

5. Run wp-admin/install.php and follow the instructions to install WordPress.

6. Done!
