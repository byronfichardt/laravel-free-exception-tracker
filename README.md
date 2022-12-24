# Laravel Watcher
![example workflow](https://github.com/github/docs/actions/workflows/main.yml/badge.svg)

This is the package need by the [Watcher app](https://github.com/byronfichardt/Watcher) to watch for exceptions in your Laravel Application.
Exceptions will be sent to the Watcher Server.

## Installation

You can install the package via composer:

```bash
composer require byronfichardt/laravel-watcher
```

You should publish the config file with:
```bash
php artisan vendor:publish --provider="ByronFichardt\Watcher\WatcherServiceProvider" --tag="config"
```

## Usage

In the Handler.php file, add the following to the report method:

```php
Watcher::report($exception);
```

Then you need to add the following to your .env file:

```bash
WATCHER_TOKEN=
WATCHER_BASE_URL=
WATCHER_SERVICE_ID=
```

## Credits

-   [Byron Fichardt](https://github.com/byronfichardt)
-   [All Contributors](../../contributors)

## License

Watcher is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)..

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
