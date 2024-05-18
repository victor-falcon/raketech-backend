- Author: Víctor Falcón <victoor89@gmail.com>

## How to Execute

The project it's super simple, you can run it with [Docker/Sail](https://laravel.com/docs/11.x/sail).

The first time, to install vendor dependencies including sail you need to:

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

Then just `./vendor/bin/sail -d`.

## About the test

- I used Pest for testing. You can find them in the /test folder and run them with `php artisan test`.
- The endpoint to return the list of countries is `api/countries`. The controller is in `app/Http/Controllers/Api/GetCountriesController.php`. I created a macro for responses (`app/Providers/ResponseMacroServiceProvider.php`) to return a list of resources. The idea is that, if we have more than one endpoint returning a list of items, we can always keep the same format.
- I also created a service (`app/Services/Countries/GetAllCountries.php`) for returning the full list of countries. It's super simple, but in the future if we have filters, for example, we can receive a simple DTO to filter results.
- About the database, for simplicity, I'm using sqlite, but we can use MySQL in production if we want.
- About docker, I usually use Herd in localhost because I feel that's faster, but I installed Sail, so you can run `./vendor/bin/sail up` and access the site on `localhost`.

## Sync Countries

Instead of calling the external API to get countries on each request, I have created a `SyncCountries` service (`app/Services/Countries/SyncCountries.php`).

This service receives an interface that is bound (`app/Providers/AppServiceProvider.php`) to the `RestCountries` implementation (`app/Services/Countries/RestCountries/RestCountriesDataSyncProvider.php`). This way, we can easily replace the external service.

The interface returns a simple DTO, which is a collection of country data, and then we create or update countries in our database using the `cca3` as a unique key.

This service is executed in the background weekly using a job `app/Jobs/SyncCountryJob.php`, and a command `app/Console/Commands/SyncCountriesCommand.php` (`routes/console.php`).

## About the Folder Structure

On big projects, I like to create bounded context folders to have all the logic related together. Instead of the current structure: 

```text
app
├── Collections
├── Console
├── DataObjects
├── Http
├── Jobs
├── Models
├── Providers
└── Services
```

The idea is to create one more layer like this.

```text
src
├── Users
|   └── // 
└── Countries
    ├── Collections
    ├── Console
    ├── DataObjects
    ├── Http
    ├── Jobs
    ├── Models
    ├── Providers
    └── Services
```

I didn't implement this in this exercise, as it's a small project/example, but I wanted to comment on it for clarity.
