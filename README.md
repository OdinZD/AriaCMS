## How to run

* Run `cp .env.example .env` file to copy example file to .env.
Then edit your .env file with DB credentials and other settings.
* Run `composer install` command
* Run `php artisan migrate --seed` command.
Notice: seed is important, because it will create the first admin user for you.
* Run `php artisan key:generate` command.
* Run `php artisan storage:link` command for file/photo fields
  * You need to delete `APP_URL=http://localhost` from .env file since this value
    is actually used in **config/app.php**, and lot of external packages rely on 
    **APP_URL** including **Spatie Media Library** for file uploads.

#### Username: odin@odin.com
#### Password: password
