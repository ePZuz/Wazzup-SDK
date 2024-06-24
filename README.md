## PHP Wazzup

## Requirements
- PHP 7.4
- Любой HTTP-клиент поддерживающий [PSR-18 (HTTP-client)](https://www.php-fig.org/psr/psr-18/)

### Install
```bash
composer require epzuz/wazzup-sdk
```

### Usage
```php
$client = new Client('Your API token', new \GuzzleHttp\Client());
```

