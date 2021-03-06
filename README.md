# Slim 3 RESTful api base project (slim3-api-base)

This is a base project for RESTful api based on Slim 3 framework.

## Create project:

    $ composer create-project --no-interaction --stability=dev ikaler/slim3-api-base my-slim-api

Replace `my-slim-api` with the desired directory name for your new application.

## Configure project:

1. `$ cd my-slim-api` or the name you provided above
2. `$ cp app/config_default.php app/config.php`
3. `$ mkdir logs`
4. `$ touch logs/app.log`

## Directories

* `app`: Application code
* `logs`: Log files
* `public`: Webserver root
* `vendor`: Composer dependencies

### Sample User table

    CREATE TABLE IF NOT EXISTS `users` (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `name` varchar(25) NOT NULL,
        `email` varchar(30) NOT NULL,
        `password` varchar(32) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `email` (`email`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8
    
Added few sample files `UserController.php`, `UserModel.php` to get started.