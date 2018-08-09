# Club Soda Website

## Installation Process

### Step 1 - Wordpress Instalation

If you have some technical background, you can skip the detailed steps in this ReadMe. Here are the simplified steps on how to install WordPress on a local computer:

1. Install a local server (Mac: [MAMP] (http://www.mamp.info), PC:XAMPP or WAMP).

2. Create a new database called clubsoda

3. Download WordPress from [wordpress.org] (http://wordpress.org/download/) and extract the files to a new folder under the htdocs folder.

4. Rename the wp-config-sample.php file to wp-config.php and update the database details according to your local server.
```
define('DB_NAME', 'club-soda')
define('DB_USER', 'root')
define('DB_PASSWORD', 'root')
define('DB_HOST', 'localhost:8889')
```

..* Run wp-admin/install.php and follow the instructions to install WordPress.

..* Done!


# Plugins

2. Install the oystershell-core and clubsoda-site plugins in the plugin directory and activate them
3. You will probably also need to install the Posts 2 Posts plugin https://wordpress.org/plugins/posts-to-posts/
4. Install the clubsoda-theme in the theme directory and activate it
5. Depending on what you are working on you may also want to install some of the other plugins used on the live site