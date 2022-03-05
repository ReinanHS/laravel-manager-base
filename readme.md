<p align="center">
<a href="https://github.com/ReinanHS/laravel-manager-base">
<img src="https://i.imgur.com/Q1NEShl.png" alt="laravel-admin">
</a>
</p>

<p align="center">
<b>Laravel manager base</b> is a tool to create a complete administrative interface in a few minutes</p>

<p align="center">
<a href="https://github.com/ReinanHS/laravel-manager-base/wiki">Documentation</a> |
<a href="#installation">Installation</a> |
<a href="#requirements">Requirements</a> |
<a href="#changelog">Change log</a> |
<a href="#contributing">Contributing</a>
</p>

<p align="center">
  <a href="https://github.com/reinanhs" alt="MadeBy"><img src="https://img.shields.io/badge/made%20by-Reinan%20Gabriel-blue?style=for-the-badge" /></a>
  <a href="https://github.com/ReinanHS/laravel-manager-base/blob/master/README.md" alt="License"><img src="https://img.shields.io/badge/license-MIT-blue?style=for-the-badge" /></a>
  <a href="https://github.com/ReinanHS/laravel-manager-base"><img alt="GitHub top language" src="https://img.shields.io/github/languages/top/reinanhs/laravel-manager-base?style=for-the-badge"></a>
  <a href="https://github.com/ReinanHS/laravel-manager-base"><img alt="GitHub branch checks state" src="https://img.shields.io/github/checks-status/reinanhs/laravel-manager-base/main?logo=github&style=for-the-badge"></a>
</p>

<p align="center">Inspired by <a href="https://github.com/z-song/laravel-admin">Laravel Admin</a> and <a href="https://nova.laravel.com">Laravel Nova</a>. </p>

## Requirements
------------
 - PHP >= 7.4
 - Laravel Framework 8.0+
 - Composer
 - Laravel Mix
 - Node.js (Version 14)
 - NPM

## Installation
------------

### 1. Require the Package

After creating a new project with Laravel, you must install the **Laravel manager base** package with the following command

```
composer require reinanhs/laravel-manager-base
```

### 2. Publish the package config

Run the command below to publish the package config file `config/manager.php`

```
php artisan vendor:publish
```

## Testing

Run the tests with:

```
composer test
```

## Helps

- `./vendor/bin/psalm`
- `./vendor/bin/testbench package:test`
- `./vendor/bin/testbench`
- `docker-compose exec php-fpm bash`

## Changelog

Please see [CHANGELOG](./changelog.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](./contributing.md) for details.

## Security

If you discover any security-related issues, please email reinangabriel1520@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](./LICENSE) for more information.