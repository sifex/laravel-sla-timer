# Laravel SLA Timer

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sifex/laravel-sla-timer.svg?style=flat-square)](https://packagist.org/packages/sifex/laravel-sla-timer)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/sifex/laravel-sla-timer/run-tests?label=tests)](https://github.com/sifex/laravel-sla-timer/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/sifex/laravel-sla-timer/Check%20&%20fix%20styling?label=code%20style)](https://github.com/sifex/laravel-sla-timer/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/sifex/laravel-sla-timer.svg?style=flat-square)](https://packagist.org/packages/sifex/laravel-sla-timer)

A Laravel package for calculating & tracking the Service Level Agreement completion timings.

## Installation

You can install the package via composer:

```bash
composer require sifex/laravel-sla-timer
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-sla-timer-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-sla-timer-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$laravelSlaTimer = new Sifex\LaravelSlaTimer();
echo $laravelSlaTimer->echoPhrase('Hello, Sifex!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/sifex/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Alex](https://github.com/sifex)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
