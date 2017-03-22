# slim3-api-base (Slim 3 API base project)

This is a base project for RESTful api based on Slim 3 framework.

## Create project:

    $ composer create-project --no-interaction --stability=dev ikaler/slim3-api-base [my-slim-api]

Replace [my-slim-api] with the desired directory name for your new application. You'll want to:

## Configure

1. `$ cd my-slim-api` or the name you provided above
2. `$ cp app/config_default.php app/config.php`
3. `$ touch logs/app.log`

## Directories

* `app`: Application code
* `logs`: Log files
* `public`: Webserver root
* `vendor`: Composer dependencies

Added few sample files `UserController.php`, `UserModel.php` to get started.