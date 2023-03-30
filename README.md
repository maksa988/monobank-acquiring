# Monobank Acquiring PHP SDK
[🇺🇦 Українською](README_UK.md)

Unofficial SDK for Monobank Acquiring. https://api.monobank.ua/docs/acquiring.html

[![Latest Stable Version](https://poser.pugx.org/maksa988/monobank-acquiring/v/stable)](https://packagist.org/packages/maksa988/monobank-acquiring)
[![Build Status](https://travis-ci.org/maksa988/monobank-acquiring.svg?branch=1.x)](https://travis-ci.org/maksa988/monobank-acquiring)
[![CodeFactor](https://www.codefactor.io/repository/github/maksa988/monobank-acquiring/badge)](https://www.codefactor.io/repository/github/maksa988/monobank-acquiring)
[![Total Downloads](https://img.shields.io/packagist/dt/maksa988/monobank-acquiring.svg?style=flat-square)](https://packagist.org/packages/maksa988/monobank-acquiring)
[![License](https://poser.pugx.org/maksa988/monobank-acquiring/license)](https://packagist.org/packages/maksa988/monobank-acquiring)

Accept payments via Monobank ([monobank.ua](https://monobank.ua/)) using this SDK package for your project.

- Invoices
- Wallet
- Merchant
- QR

#### PHP >= 8.0

## Installation

Require this package with composer.

``` bash
composer require "maksa988/monobank-acquiring"
```

## Usage

To use this package you need to do some steps:

1) Create config with your X-Token from [acquiring cabinet](https://fop.monobank.ua/) or test token from [api cabinet](https://api.monobank.ua/)

``` php
$config = new \Maksa988\MonobankAcquiring\Config("YOUR X-TOKEN HERE");
```

To get more details about config read [Wiki](https://github.com/maksa988/monobank-acquiring/wiki)

2) Create main object of SDK to call your requests and put config in constructor

``` php 
$monobank = new \Maksa988\MonobankAcquiring\MonobankAcquiring($config);
```

3) Now you can use methods from SDK

``` php 
$request = new \Maksa988\MonobankAcquiring\Requests\MerchantDetailsRequest();

$result = $monobank->call($request);

// $result is the Maksa988\MonobankAcquiring\Models\MerchantDetails object

$result->getMerchantName(); // "12o4Vv7EWy"
$result->getMerchantId(); // "Your Favourite Company"
```

To get more examples and methods use [Wiki](https://github.com/maksa988/monobank-acquiring/wiki)

## Laravel

You can use this SDK with Laravel, just use [maksa988/laravel-monobank-acquiring](https://maksa988/laravel-monobank-acquiring) package instead

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please send me an email at maksa988ua@gmail.com instead of using the issue tracker.

## Credits

- [Maksa988](https://github.com/maksa988)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
