# slim3-api-base (Slim 3 API base project)

This is a base restful api project based on Slim 3 framework.

## Create project:

    $ composer create-project --no-interaction ikaler/slim3-api-base slim-api

## Configure

1. `$ cd slim-api`
2. `$ cp app/config_default.php config.php`
3. `$ touch logs/app.log`

## Directories

* `app`: Application code
* `logs`: Log files
* `public`: Webserver root
* `vendor`: Composer dependencies

Added few sample files `UserController.php`, `UserModel.php` to get started.