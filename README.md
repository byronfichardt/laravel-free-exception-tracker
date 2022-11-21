# Laravel Open Exception Tracker

This is the package required to track exceptions on your Laravel Application.
It will send the exception to the Open Exception Tracker Server.

## Installation

You can install the package via composer:

```bash
composer require byronfichardt/laravel-free-exception-tracker
```

You should publish the config file with:
```bash
php artisan vendor:publish --provider="ByronFichardt\LaravelFreeExceptionTracker\LaravelFreeExceptionTrackerServiceProvider" --tag="config"
```

## Usage

In the Hanler.php file, add the following to the report method:

```php
Tracker::report($exception);
```

## Credits

-   [Byron Fichardt](https://github.com/byronfichardt)
-   [All Contributors](../../contributors)

## License

Open Exception Tracker is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)..

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
