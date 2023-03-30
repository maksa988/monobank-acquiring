# Monobank Acquiring PHP SDK

Неофіційний SDK для еквайрингу від Monobank. https://api.monobank.ua/docs/acquiring.html

[![Latest Stable Version](https://poser.pugx.org/maksa988/monobank-acquiring/v/stable)](https://packagist.org/packages/maksa988/monobank-acquiring)
[![Build Status](https://travis-ci.org/maksa988/monobank-acquiring.svg?branch=1.x)](https://travis-ci.org/maksa988/monobank-acquiring)
[![CodeFactor](https://www.codefactor.io/repository/github/maksa988/monobank-acquiring/badge)](https://www.codefactor.io/repository/github/maksa988/monobank-acquiring)
[![Total Downloads](https://img.shields.io/packagist/dt/maksa988/monobank-acquiring.svg?style=flat-square)](https://packagist.org/packages/maksa988/monobank-acquiring)
[![License](https://poser.pugx.org/maksa988/monobank-acquiring/license)](https://packagist.org/packages/maksa988/monobank-acquiring)

Приймайте платежі через Monobank ([monobank.ua](https://monobank.ua/)) використовуючи цей SDK пакет для свого проекту.

- Платежі
- Гаманець
- Мерчант
- QR - каси

#### PHP >= 8.0

## Встановлення

Додайте пакет у ваш проект за допомогою composer.

``` bash
composer require "maksa988/monobank-acquiring"
```

## Використання

Для використання пакету вам необхідно виконати декілька кроків:

1) Створіть конфіг з вашим X-Token взявши його в вашому [кабінеті для еквайрингу](https://fop.monobank.ua/) або ваш тестовий токен з [api кабінету](https://api.monobank.ua/)

``` php
$config = new \Maksa988\MonobankAcquiring\Config("ВАШ X-TOKEN ТУТ");
```

Щоб отримати більше даталей про параметри конфігу, читайте [Wiki](https://github.com/maksa988/monobank-acquiring/wiki)

2) Створіть головний обʼєкт SDK щоб викликати ваші запити та передайте створений вами конфіг в конструктор

``` php 
$monobank = new \Maksa988\MonobankAcquiring\MonobankAcquiring($config);
```

3) Тепер ви можете використовувати метод з SDK

``` php 
$request = new \Maksa988\MonobankAcquiring\Requests\MerchantDetailsRequest();

$result = $monobank->call($request);

// $result це обʼєкт класу Maksa988\MonobankAcquiring\Models\MerchantDetails

$result->getMerchantName(); // "12o4Vv7EWy"
$result->getMerchantId(); // "Your Favourite Company"
```

Щоб переглянути більше даталей та методів використовуйте [Wiki](https://github.com/maksa988/monobank-acquiring/wiki)

## Laravel

Ви можете використовувати цей SDK з Laravel, для цього просто використовуйте наступний пакет - [maksa988/laravel-monobank-acquiring](https://maksa988/laravel-monobank-acquiring)

## Changelog

Переглядайте [CHANGELOG](CHANGELOG.md) для інформації які зміни було внесено в SDK.

## Contributing

Перегляньте [CONTRIBUTING](CONTRIBUTING.md) для деталей.

## Security

Якщо ви знайшли будь яку проблему безпеки, будь ласка надішліть мені електроний лист на maksa988ua@gmail.com замість того що використовувати Issue Tracker на GitHub.

## Credits

- [Maksa988](https://github.com/maksa988)
- [All Contributors](../../contributors)

## License

Надається за MIT ліцензією (MIT). Перегляньте [License File](LICENSE.md) для більшої інформації.
