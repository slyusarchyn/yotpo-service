# Laravel YotpoService Package

[![PHP](https://img.shields.io/github/tag/slyusarchyn/yotpo-service.svg)](https://github.com/slyusarchyn/yotpo-service)
[![Downloads](https://img.shields.io/github/downloads/slyusarchyn/yotpo-service/total.svg)](https://github.com/slyusarchyn/yotpo-service)
[![Stars](https://img.shields.io/github/stars/slyusarchyn/yotpo-service.svg)](https://github.com/slyusarchyn/yotpo-service)

YOTPO API

## Installation

To install this package you will need:

* Laravel 5.5 +
* PHP >= 7.1.3

Install via **composer** - edit your `composer.json` to require the package.
```json
"require": {
    "slyusarchyn/yotpo-service": "1.0.*"
}
```
Then run `composer update` in your terminal to install it in.

OR

Run `composer require slyusarchyn/yotpo-service`

After installation you need to add the service provider to your `app.php` config file.

```php
'providers' => [
    // ...
    Slyusarchyn\YotpoServiceProvider\YotpoServiceProvider::class,
    // ...
],
```

## Configuration

Add configuration file `yotpo.php`

```php
<?php

return [
    'app_key'    => env('YOTPO_APP_KEY'),
    'secret_key' => env('YOTPO_SECRET_KEY'),
];
```

OR

Run `php artisan vendor:publish --provider="Slyusarchyn\YotpoServiceProvider\YotpoServiceProvider"`

AND

Define `YOTPO_APP_KEY` and `YOTPO_SECRET_KEY` environment variables in your server configuration or `.env` file.

## License

MIT License

Copyright (c) 2019 slyusarchyn

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.